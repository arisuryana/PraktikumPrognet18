<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\Product;
use Alert;

class TransaksiController extends Controller
{
    public function index()
    {
        $this->data['transaksi'] = Transaction::all();

        return view('Admin.transaksi', $this->data);
        //return $this->data;
    }

    public function updateStatus($id, Request $request)
    {

        Transaction::find($id)->update([
            'status' => $request->status
        ]);

        //Alert::success('Success Message', 'Update Success')->persistent("Close");
        return redirect('/admin/transaksi');
    }
}
