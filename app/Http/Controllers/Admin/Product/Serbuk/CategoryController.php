<?php

namespace App\Http\Controllers\Admin\Product\Serbuk;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CategoryStoreRequest;
use App\Http\Requests\Product\CategoryUpdateRequest;
use App\Models\Product\Category;
use App\Models\Product\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{

    private $type = 'POWDER';
    private $path = 'storage'.DIRECTORY_SEPARATOR.'product'.DIRECTORY_SEPARATOR.'serbuk';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::serbuk();

            if (isset($request->array))
                return respSuccess($data->select('id', 'name')->get()->toArray());

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);

        } else {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CategoryStoreRequest $request)
    {
        try {
            DB::beginTransaction();

            $model = new Category();
            $model->name = $request->nama;
            $model->status = $request->status === 'true'? true: false;;
            $model->type = $this->type;
            $model->save();

            DB::commit();

            return respSuccess($model);
        } catch (\Exception $e) {
            DB::rollBack();

            return respError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $model = Category::findOrFail($id);
        return respSuccess($model);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        $model = Category::findOrFail($id);
        try {
            DB::beginTransaction();
            $model->name = $request->nama;
            $model->status = $request->status === 'true'? true: false;;
            $model->type = $this->type;
            $model->save();
            DB::commit();
            return respSuccess($model);
        }catch(\Exception $e){
            DB::rollBack();
            return respError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $model = Category::findOrFail($id);
        try {
            DB::beginTransaction();
            foreach ($model->product as $product){
                $image = $product->image_serbuk;
                if($image){
                    if (File::exists(public_path($this->path) . DIRECTORY_SEPARATOR . $image->modified_filename))
                        File::delete(public_path($this->path) . DIRECTORY_SEPARATOR . $image->modified_filename);

                   $image->delete();
                }
                $product->delete();
            }
            $model->delete();
            DB::commit();
            return respSuccess($model);
        }catch (\Exception $e){
            DB::rollBack();

            return respError($e->getMessage());
        }
    }
}
