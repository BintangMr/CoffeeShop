<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class ImageController extends Controller
{

    private $path = 'storage' . DIRECTORY_SEPARATOR . 'gallery' . DIRECTORY_SEPARATOR . 'image';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = GalleryImage::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image_url', function ($row) {
                    return asset($this->path . DIRECTORY_SEPARATOR . $row->modified_filename);
                })
                ->make(true);
        }

        return view('admin.gallery.image.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $image = $request->file('gambar');
            $originalFileName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $size = $image->getSize();

            $model = new GalleryImage() ;
            $model->original_filename = $originalFileName;
            $model->extension = $extension;
            $model->size = $size;
            $model->status = $request->status === 'true' ? true : false;;
            $model->save();

            $modifiedFileName = $model->id . '-' . Carbon::now()->timestamp . '.' . $image->getClientOriginalExtension();
            $model->modified_filename = $modifiedFileName;
            $model->save();

            $request->file('gambar')->move(public_path($this->path), $modifiedFileName);

            DB::commit();
            return respSuccess($model);
        } catch (\Exception $e) {
            DB::rollBack();
            return respError($e->getMessage());
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $model = GalleryImage::findOrFail($id);
        $model->image_url = asset($this->path.DIRECTORY_SEPARATOR.$model->modified_filename);
        return respSuccess($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $model = GalleryImage::findOrFail($id);
        try {
            DB::beginTransaction();

            $model->status = $request->status === 'true' ? true : false;

            if ($request->hasFile('gambar')) {
                if (File::exists(public_path($this->path) . DIRECTORY_SEPARATOR . $model->modified_filename))
                File::delete(public_path($this->path) . DIRECTORY_SEPARATOR . $model->modified_filename);

                $image = $request->file('gambar');
                $originalFileName = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $size = $image->getSize();

                $modifiedFileName = $model->id . '-' . Carbon::now()->timestamp . '.' . $image->getClientOriginalExtension();

                $model->original_filename = $originalFileName;
                $model->extension = $extension;
                $model->size = $size;
                $model->modified_filename = $modifiedFileName;

                $request->file('gambar')->move(public_path($this->path), $modifiedFileName);
            }

            $model->save();
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
        $model = GalleryImage::findOrFail($id);
        try {
            DB::beginTransaction();
            if (File::exists(public_path($this->path) . DIRECTORY_SEPARATOR . $model->modified_filename))
                File::delete(public_path($this->path) . DIRECTORY_SEPARATOR . $model->modified_filename);
            $model->delete();
            DB::commit();

            return respSuccess($model);
        }catch (\Exception $e){
            DB::rollBack();

            return respError($e->getMessage());
        }
    }
}
