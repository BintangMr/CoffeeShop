<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Contact::first();

            return respSuccess($data);
        }

        return view('admin.contact.index');
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

            $model = Contact::first();

            if (!$model) $model = new Contact();

            $model->market_place = $request->market;
            $model->whatsapp = $request->whatsapp;
            $model->save();

            DB::commit();

            return respSuccess($model);
        } catch (\Exception $e) {
            DB::rollBack();

            return respError($e->getMessage());
        }
    }
}
