@extends('layout/main')
@section('title', 'Halaman home')

@section('home')
<div class="container-fluid">
    <ul class="nav nav-tabs">
        {{-- <li>
          <a class="nav-link" href="/">Home</a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link" href="/invoice">Invoice</a>
        </li>
    </ul>
    <h3>Welcome, this is a application for a interview me</h3>
    {{-- <form action="/showInvoiceId/" method="post">
      @csrf
      <div class="form-group" style="margin-top: 10px;">
        <select name="invoice_id" id="invoice-id" class="form-control">
          <option value="">--Pilih kasir--</option>
          @foreach ($invoice_noted as $x)
          <option value=" {{ $x->id }} "> {{ $x->nama_kasir }} </option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-sm">Kirim</button>
      </div>
    </form> --}}
    {{-- @foreach ($invoice_noted as $x)
    <ul>
      <li>Tanggal invoice : {{ $x->tanggal_invoice }} </li>
      <li>Grand total : Rp. {{ number_format($x->grand_total, 2, ',', '.') }} </li>
      <li>Nama kasir : {{ $x->nama_kasir }} </li>
      <li><button ></button></li>
      <li>
        Detail : 
        <ol type="a">
          @foreach ($invoice_detail as $y)
          <li> {{ $y->nama_barang }}, {{ $y->jumlah_pembelian }}, Rp. {{ number_format($y->harga_satuan, 2, ',', '.') }}, Rp. {{ number_format($y->harga_total, 2, ',', '.') }}</li>
          @endforeach
        </ol>
      </li>
    </ul>
    @endforeach --}}
</div>
@endsection