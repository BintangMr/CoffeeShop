<?php

namespace App\Http\Controllers\Admin\Product\Beverage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Models\Product\Image;
use App\Models\Product\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    private $path = 'storage' . DIRECTORY_SEPARATOR . 'product' . DIRECTORY_SEPARATOR . 'beverage';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::beverage();

            if (isset($request->array))
                return respSuccess($data->select('id', 'name')->get()->toArray());

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image_url', function ($row) {
                    return $row->image_beverage ? asset($this->path . DIRECTORY_SEPARATOR . $row->image_beverage->modified_filename) : null;
                })
                ->rawColumns(['action'])
                ->make(true);

        }

        return view('admin.product.beverage.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $model = new Product();
            $model->category_id = $request->kategori;
            $model->name = $request->nama;
            $model->simple_description = $request->deskripsi_singkat;
            $model->long_description = $request->deskripsi_lengkap;
            $model->original_price = $request->harga;
            $model->discount_price = $request->diskon;
            $model->status = $request->status === 'true' ? true : false;;
            $model->save();

            if ($request->hasFile('gambar')) {
                $image = $request->file('gambar');
                $modifiedFileName = $model->id . '-' . Carbon::now()->timestamp . '.' . $image->getClientOriginalExtension();
                $originalFileName = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $size = $image->getSize();

                $whiteboardImage = new Image();
                $whiteboardImage->product_id = $model->id;
                $whiteboardImage->original_filename = $originalFileName;
                $whiteboardImage->modified_filename = $modifiedFileName;
                $whiteboardImage->extension = $extension;
                $whiteboardImage->size = $size;
                $whiteboardImage->save();

                $request->file('gambar')->move(public_path($this->path), $modifiedFileName);
            }
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
        $model = Product::with('category_beverage', 'image_beverage')->findOrFail($id);

        if ($model->image_beverage) $model->image_beverage->image_url = asset($this->path . DIRECTORY_SEPARATOR . $model->image_beverage->modified_filename);
        return respSuccess($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $model = Product::with('image_beverage')->findOrFail($id);
        try {
            DB::beginTransaction();
            $model->category_id = $request->kategori;
            $model->name = $request->nama;
            $model->simple_description = $request->deskripsi_singkat;
            $model->long_description = $request->deskripsi_lengkap;
            $model->original_price = $request->harga;
            $model->discount_price = $request->diskon;
            $model->status = $request->status === 'true' ? true : false;;
            $model->save();

            if ($request->hasFile('gambar')) {
                if ($model->image_beverage) {
                    if (File::exists(public_path($this->path) . DIRECTORY_SEPARATOR . $model->image_beverage->modified_filename))
                        File::delete(public_path($this->path) . DIRECTORY_SEPARATOR . $model->image_beverage->modified_filename);

                    $model->image_beverage->delete();
                }
                $image = $request->file('gambar');
                $modifiedFileName = $model->id . '-' . Carbon::now()->timestamp . '.' . $image->getClientOriginalExtension();
                $originalFileName = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $size = $image->getSize();

                $whiteboardImage = new Image();
                $whiteboardImage->product_id = $model->id;
                $whiteboardImage->original_filename = $originalFileName;
                $whiteboardImage->modified_filename = $modifiedFileName;
                $whiteboardImage->extension = $extension;
                $whiteboardImage->size = $size;
                $whiteboardImage->save();

                $request->file('gambar')->move(public_path($this->path), $modifiedFileName);
            }
            DB::commit();

            return respSuccess($model);
        } catch (\Exception $e) {
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
        $model = Product::findOrFail($id);
        try {
            DB::beginTransaction();
            $image = $model->image_beverage;
            if ($image) {
                if (File::exists(public_path($this->path) . DIRECTORY_SEPARATOR . $image->modified_filename))
                    File::delete(public_path($this->path) . DIRECTORY_SEPARATOR . $image->modified_filename);

                $image->delete();
            }
            $model->delete();
            DB::commit();
            return respSuccess($model);
        } catch (\Exception $e) {
            DB::rollBack();

            return respError($e->getMessage());
        }
    }
}
