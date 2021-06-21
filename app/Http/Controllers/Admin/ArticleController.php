<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Article\ArticleStoreRequest;
use App\Http\Requests\Article\ArticleUpdateRequest;
use App\Models\Article\Article;
use App\Models\Article\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;


class ArticleController extends Controller
{
    private $path = 'storage'.DIRECTORY_SEPARATOR.'article';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Article::with('image');

            return DataTables::of($data)
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);

        }

        return view('admin.article.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ArticleStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $model = new Article();
            $model->title = $request->judul;
            $model->description = $request->deskripsi;
            $model->caption = $request->caption;
            $model->status = $request->status === 'true' ? true : false;;
            $model->save();

            if ($request->hasFile('gambar')) {
                $image = $request->file('gambar');
                $modifiedFileName = $model->id . '-' . Carbon::now()->timestamp . '.' . $image->getClientOriginalExtension();
                $originalFileName = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $size = $image->getSize();

                $whiteboardImage = new Image();
                $whiteboardImage->article_id = $model->id;
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $model = Article::with('image')->findOrFail($id);
        return respSuccess($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ArticleUpdateRequest $request, $id)
    {
        $model = Article::with('image')->findOrFail($id);
        try {
            DB::beginTransaction();
            $model->title = $request->judul;
            $model->description = $request->deskripsi;
            $model->caption = $request->caption;
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
                $whiteboardImage->article_id = $model->id;
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
        $model = Article::with('image')->findOrFail($id);
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
