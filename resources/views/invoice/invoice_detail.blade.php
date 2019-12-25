@extends('layout/main')
@section('title', 'Halaman invoice detail')

@section('invoice_detail')
    <div class="container-fluid">
        <h3>Data detail invoice</h3>
        <a href="/invoice" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Kembali" style="margin-bottom: 10px;">Kembali</a>
        <div class="">
            <b>Detail : </b>
            <span>
                Tanggal invoice : {{ $invoice_noted->tanggal_invoice }} 
                Grand total : Rp. {{ number_format($invoice_noted->grand_total, 2, ',', '.') }}
                Nama kasir : {{ $invoice_noted->nama_kasir }}
            </span>
        </div>
        <br />
        <table class="table table-hover">
            <tr>
                <th>No</th>
                <th>Nama barang</th>
                <th>Jumlah pembelian</th>
                <th>Harga satuan</th>
                <th>Harga total</th>
                <th>Opsi</th>
            </tr>
            @foreach ($invoice_detail as $invoice)
            <tr>
                <td> {{ $no++ }} </td>
                <td> {{ $invoice->nama_barang }} </td>
                <td> {{ $invoice->jumlah_pembelian }} unit </td>
                <td> Rp. {{ number_format($invoice->harga_satuan, 2, ',', '.') }} </td>
                <td> Rp. {{ number_format($invoice->harga_total, 2, ',', '.') }} </td>
                <td>
                    <a href="/invoice/detail/edit/{{ $invoice->id }}" class="btn btn-outline-warning btn-sm"><span class="fas fa-edit"></span></a>
                    <a href="/invoice/detail/hapus/{{ $invoice->id }}" class="btn btn-outline-danger btn-sm" id="modal-delete"><span class="fas fa-trash-alt"></span></a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection