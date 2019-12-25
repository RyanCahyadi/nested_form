@extends('layout/main')
@section('title', 'Halaman invoice detail')

@section('home_detail')
    <style>
        ul {
            list-style: none;
            list-style-position: inside;
        }
    </style>
    <div class="container-fluid">
        <h3>List invoice</h3>
        <a href="/" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Kembali" style="margin-bottom: 10px;">Kembali</a>
        <ul>
            <li>Tanggal invoice : {{ $invoice_noted->tanggal_invoice }} </li>
            <li>Grand total : Rp. {{ number_format($invoice_noted->grand_total, 2, ',', '.') }} </li>
            <li>Nama kasir : {{ $invoice_noted->nama_kasir }} </li>
            <li>
                Detail : 
                <ol type="A">
                    @foreach ($invoice_detail as $x)
                    <li> {{ $x->nama_barang }} , {{ $x->jumlah_pembelian }} unit, Rp. {{ number_format($x->harga_satuan, 2, ',', '.') }}, Rp. {{ number_format($x->harga_total, 2, ',', '.')}} </li>
                    @endforeach
                </ol>
            </li>
        </ul>
    </div>
@endsection