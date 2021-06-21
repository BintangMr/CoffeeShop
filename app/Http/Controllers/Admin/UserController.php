<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);

        }

        return view('admin.user.index');
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
            $model = new User();
            $model->name = $request->nama;
            $model->email = $request->email;
            $model->email_verified_at = Carbon::now();
            $model->password = Hash::make($request->password);
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
        $model = User::findOrFail($id);
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
        $model = User::findOrFail($id);
        try {
            DB::beginTransaction();
            $model->name = $request->nama;
            $model->email = $request->email;
            $model->email_verified_at = Carbon::now();
            if($request->password)
                $model->password = Hash::make($request->password);
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
        $model = User::findOrFail($id);
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
