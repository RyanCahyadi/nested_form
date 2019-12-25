@extends('layout/main')
@section('title', 'Halaman edit invoice')

@section('invoice_edit')
    <div class="container-fluid">
        <h3>Halaman edit invoice</h3>
        <a href="/invoice" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Kembali" style="margin-bottom: 10px;">Kembali</a>
        @foreach ($invoice_noted as $invoice)
        <form action="/invoice/detail/update/{{ $invoice->id }}" method="post">
            @csrf
            @method('PUT')
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nama barang</th>
                        <th>Jumlah pembelian</th>
                        <th>Harga satuan</th>
                        <th>Harga total</th>
                        {{-- <th>
                            <a href="#" class="btn btn-warning btn-sm" id="add-row"><i class="glyphicon glyphicon-plus"></i></a>
                        </th> --}}
                        {{-- <th>Invoice id</th> --}}
                    </tr>
                </thead>
                <tbody id="table-detail">
                    <tr>
                        <td><input type="text" name="nama_barang" class="form-control" value="{{ $invoice->nama_barang }}" id="nama-barang" placeholder="Nama barang . . ."></td>
                        <td><input type="number" name="jumlah_pembelian" class="form-control" id="jumlah-pembelian" value="{{ $invoice->jumlah_pembelian }}"></td>
                        <td><input type="number" name="harga_satuan" class="form-control" id="harga-satuan" value="{{ $invoice->harga_satuan }}"></td>
                        <td><input type="number" name="harga_total" class="form-control" id="harga-total" onfocus="" value="{{ $invoice->harga_total }}" readonly placeholder="Harga total . . ."></td>
                        {{-- <td><a class="btn btn-danger btn-sm" id="remove-row"><i class="glyphicon glyphicon-remove"></i></a></td> --}}
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        @endforeach
    </div>
    <script>
        // $('#add-row').on('click', function(){
        //     addRow();
        // });
        
        // $('#remove-row').live('click', function(){
        //     var rowOne = $('tbody tr').length;
        //     if (rowOne == 1) {  
        //         alert("You can't deleted row one");
        //     } else{
        //         $(this).parent().parent().remove();
        //     }
        // });

        $('tbody').delegate('#jumlah-pembelian, #harga-satuan', 'keyup', function(){
            var tr = $(this).parent().parent();
            var jumlahPembelian = tr.find('#jumlah-pembelian').val();
            var hargaSatuan     = tr.find('#harga-satuan').val();
            var hargaTotal      = (jumlahPembelian * hargaSatuan);
            tr.find('#harga-total').val(hargaTotal);
        });

        // function addRow() {
        //     var row = '<tr>';
        //         row += '<td><input type="text" name="nama_barang[]" class="form-control" id="nama-barang" placeholder="Nama barang . . ."></td>';
        //         row += '<td><input type="number" name="jumlah_pembelian[]" class="form-control" id="jumlah-pembelian" placeholder="Jumlah pembelian . . ."></td>';
        //         row += '<td><input type="number" name="harga_satuan[]" class="form-control" id="harga-satuan" placeholder="Harga satuan . . ."></td>';
        //         row += '<td><input type="number" name="harga_total[]" class="form-control" id="harga-total" readonly placeholder="Harga total . . ."></td>';
        //         row += '<td><a class="btn btn-danger btn-sm" id="remove-row"><i class="glyphicon glyphicon-remove"></i></a></td>';
        //         $('#table-detail').append(row);
        // };
    </script>
@endsection