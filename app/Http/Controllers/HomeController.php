<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\InvoiceDetail;
use App\InvoiceNoted;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $invoice = DB::table('invoice_noted')
        //             ->leftJoin('invoice_detail', 'invoice_noted.id', '=', 'invoice_detail.invoice_id')
        //             ->get();
        // dd($invoice);
        $invoice_noted  = InvoiceNoted::all();
        // $invoice_detail = DB::table('invoice_noted')
        //                     ->leftJoin('invoice_detail', 'invoice_noted.id', '=', 'invoice_detail.invoice_id')
        //                     ->where('nama_kasir', '=', $invoice_noted->nama_kasir)
        //                     ->get();
        $invoice_detail = InvoiceDetail::all();
        
        return view('index', [
            'invoice_noted'     => $invoice_noted,
            'invoice_detail'    => $invoice_detail
        ]);
    }

    // public function showInvoiceId(Request $request)
    // {
    //     // return $request->invoice_id;
    //     $invoice_detail = DB::table('invoice_noted')
    //                 ->leftJoin('invoice_detail', 'invoice_noted.id', '=', 'invoice_detail.invoice_id')
    //                 ->where('invoice_id', '=', $request->invoice_id)
    //                 ->get();
    //     $invoice_noted  = InvoiceNoted::where('id', '=', $request->invoice_id)->first();
    //     // dd($invoice);
    //     return view('invoice', [
    //         'invoice_detail'    => $invoice_detail,
    //         'invoice_noted'     => $invoice_noted
    //     ]);
    // }
}