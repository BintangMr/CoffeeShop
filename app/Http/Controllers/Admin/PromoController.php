<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Promo\PromoStoreRequest;
use App\Http\Requests\Promo\PromoUpdateRequest;
use App\Models\Promo\Image;
use App\Models\Promo\Promo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class PromoController extends Controller
{
    private $path = 'storage'.DIRECTORY_SEPARATOR.'promo';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Promo::with('image');

            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);

        }

        return view('admin.promo.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromoStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $model = new Promo();
            $model->title = $request->judul;
            $model->description = $request->deskripsi;
            $model->status = $request->status === 'true' ? true : false;;
            $model->save();

            if ($request->hasFile('gambar')) {
                $image = $request->file('gambar');
                $modifiedFileName = $model->id . '-' . Carbon::now()->timestamp . '.' . $image->getClientOriginalExtension();
                $originalFileName = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $size = $image->getSize();

                $whiteboardImage = new Image();
                $whiteboardImage->promo_id = $model->id;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Promo::with('image')->findOrFail($id);
        return respSuccess($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PromoUpdateRequest $request, $id)
    {
        $model = Promo::with('image')->findOrFail($id);
        try {
            DB::beginTransaction();
            $model->title = $request->judul;
            $model->description = $request->deskripsi;
            $model->status = $request->status === 'true' ? true : false;;
            $model->save();

            if ($request->hasFile('gambar')) {
                if ($model->image) {
                    if (File::exists(public_path($this->path) . DIRECTORY_SEPARATOR . $model->image->modified_filename))
                        File::delete(public_path($this->path) . DIRECTORY_SEPARATOR . $model->image->modified_filename);

                    $model->image->delete();
                }
                $image = $request->file('gambar');
                $modifiedFileName = $model->id . '-' . Carbon::now()->timestamp . '.' . $image->getClientOriginalExtension();
                $originalFileName = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $size = $image->getSize();

                $whiteboardImage = new Image();
                $whiteboardImage->promo_id = $model->id;
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
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $model = Promo::with('image')->findOrFail($id);
        try {
            DB::beginTransaction();
            $image = $model->image;
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
