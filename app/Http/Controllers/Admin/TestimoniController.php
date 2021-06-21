<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Testimoni\TestimoniStoreRequest;
use App\Http\Requests\Testimoni\TestimoniUpdateRequest;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Testimoni::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);

        }

        return view('admin.testimoni.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TestimoniStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $model = new Testimoni();
            $model->name = $request->nama;
            $model->description = $request->deskripsi;
            $model->job = $request->pekerjaan;
            $model->status = $request->status === 'true' ? true : false;;
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
        $model = Testimoni::findOrFail($id);
        return respSuccess($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TestimoniUpdateRequest $request, $id)
    {
        $model = Testimoni::findOrFail($id);
        try {
            DB::beginTransaction();
            $model->name = $request->nama;
            $model->description = $request->deskripsi;
            $model->job = $request->pekerjaan;
            $model->status = $request->status === 'true' ? true : false;;
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
        $model = Testimoni::findOrFail($id);
        try {
            DB::beginTransaction();
            $model->delete();
            DB::commit();
            return respSuccess($model);
        } catch (\Exception $e) {
            DB::rollBack();

            return respError($e->getMessage());
        }
    }
}
