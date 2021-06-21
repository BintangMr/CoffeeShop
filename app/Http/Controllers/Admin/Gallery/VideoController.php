<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use App\Models\GalleryVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = GalleryVideo::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->rawColumns(['embed','prod_embed'])
                ->make(true);

        }

        return view('admin.gallery.video.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $model = new GalleryVideo();
            $model->url = $request->url;
            $model->status = $request->status === 'true' ? true : false;;
            $model->save();
            DB::commit();

            return respSuccess($model);
        }catch (\Exception $e){
            DB::rollBack();
            return respError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $model = GalleryVideo::findOrFail($id);
        return respSuccess($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $model = GalleryVideo::findOrFail($id);
        try {
            DB::beginTransaction();
            $model->url = $request->url;
            $model->status = $request->status === 'true' ? true : false;;
            $model->save();
            DB::commit();
            return respSuccess($model);
        }catch (\Exception $e){
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
        $model = GalleryVideo::findOrFail($id);
        try {
            DB::beginTransaction();
            $model->delete();
            DB::commit();
            return respSuccess($model);
        }catch (\Exception $e){
            DB::rollBack();

            return respError($e->getMessage());
        }
    }
}
