<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use DataTables;

class PaymentDashboardController extends Controller {

    public function index()
    {

        return view('payment.index');
    }

    public function store()
    {
        return view('payment.store');
    }

    public function getData()
    {
        $data = Payment::all();

        return DataTables::of($data)
             ->editColumn('delete_data',function($row) {
                //  return [
                //      'deletes' => route('delete.data',$row->id)
                //  ];
                return '<input type="checkbox" name="id[]" onclick="' . route('delete.data',$row->id) . '"';
             })->rawColumns(['delete_data'])->make(true);
    }
}