<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InvoiceDetail;
use App\InvoiceNoted;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data01 = InvoiceNoted::all();
        $no = 1;
        // dd($data01);
        return view('invoice/invoice', [
            'invoice_noted' => $data01,
            'no'            => $no    
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoice/invoice_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'tanggal_invoice'   => 'required'
        ]);

        $data01 = $request->all();
        $last_id = InvoiceNoted::create($data01)->id;
        if (count($request->nama_barang) > 0) {
            foreach ($request->nama_barang as $item => $x) {
                $data02 = array(
                    'invoice_id'        => $last_id,
                    'nama_barang'       => $request->nama_barang[$item],
                    'jumlah_pembelian'  => $request->jumlah_pembelian[$item],
                    'harga_satuan'      => $request->harga_satuan[$item],
                    'harga_total'  => $request->harga_total[$item],
                );
                InvoiceDetail::insert($data02);
            }
        }
        return redirect('/invoice')->with('success', 'Successfully added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function detail($id)
    {
        $data01 = InvoiceDetail::where('invoice_id', '=', $id)->get();
        $data02 = InvoiceNoted::where('id', '=', $id)->first();
        $no = 1;
        // dd($data01);
        return view('invoice/invoice_detail',[
            'invoice_detail'    => $data01,
            'invoice_noted'     => $data02,
            'no'                => $no
        ]);
    }

    public function hapusDetail($id)
    {
        $data01 = InvoiceDetail::find($id);
        $data01->delete();

        return redirect('/invoice')->with('success', 'Successfully deleted !');
    }

    public function editDetail($id)
    {
        $data01 = InvoiceDetail::where('id', '=', $id)->get();
        $no = 1;
        // dd($data01);
        return view('invoice/invoice_edit', [
            'invoice_noted'     => $data01,
            'no'                => $no
        ]);
    }

    public function updateDetail(Request $request, $id)
    {
        $data01 = InvoiceDetail::find($id);
        $data01->nama_barang        = $request->nama_barang;
        $data01->jumlah_pembelian   = $request->jumlah_pembelian;
        $data01->harga_satuan       = $request->harga_satuan;
        $data01->harga_total        = $request->harga_total;
        
        $data01->save();

        return redirect('/invoice')->with('success', 'Successfully updated !');
    }

}
