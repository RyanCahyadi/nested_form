@extends('layout/main')

@section('title', 'Halaman invoice')

@section('invoice')
    <div class="container-fluid">
        <h3>Data invoice</h3>
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible" id="alert-success" style="margin-top: 10px;">
                {{-- <a href="#" class="close" id="close-alert" data-dismiss="alert" aria-label="close">&times;</a> --}}
                <strong>{{ Session::get('success') }}</strong>
            </div>
        @endif
        <a href="/invoice/create" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Tambah invoice" style="margin-bottom: 10px;">Tambah invoice</a>
        <a href="/" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Kembali ke halaman utama" style="margin-bottom: 10px;">Kembali</a>
        <table class="table table-hover">
            <tr>
                <th>No</th>
                <th>Tanggal invoice</th>
                <th>Grand total</th>
                <th>Nama kasir</th>
                <th>Detail invoice</th>
            </tr>
            @foreach ($invoice_noted as $invoice)
            <tr>
                <td> {{ $no++ }} </td>
                <td> {{ $invoice->tanggal_invoice }} </td>
                <td> Rp. {{ number_format($invoice->grand_total, 2, ',', '.') }} </td>
                <td> {{ $invoice->nama_kasir }} </td>
                <td>
                    <a href="/invoice/detail/{{ $invoice->id }}"> See more </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <script>
        $(document).ready(function(){
            $("#alert-success").hover(function(){
                $("#alert-success").hide();
            });
            // $('#alert-success').ready(function(){
            //     $('#alert-success').hide(1000);
            // });
        });
        // $('#alert-success').hover(function(){
        //     $('.alert-success').fadeOut(500);
        // });
    </script>
@endsection