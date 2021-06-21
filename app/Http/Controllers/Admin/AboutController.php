<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\About\AboutStoreRequest;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = About::first();

            return respSuccess($data);
        }

        return view('admin.about.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AboutStoreRequest $request)
    {
        try {
            DB::beginTransaction();

            $model = About::first();

            if(!$model) $model = new About();

            $model->title = $request->judul;
            $model->sub_title = $request->sub_judul;
            $model->description = $request->deskripsi;
            $model->save();

            DB::commit();

            return respSuccess($model);
        } catch (\Exception $e) {
            DB::rollBack();

            return respError($e->getMessage());
        }
    }

}
