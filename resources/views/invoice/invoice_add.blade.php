@extends('layout/main')
@section('title', 'Halaman tambah invoice')

@section('invoice_add')
    <div class="container-fluid">
        <form action="/invoice/store" method="post">
            @csrf
            <h2>Form tambah invoice</h2>
            <a href="/invoice" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Kembali" style="margin-bottom: 10px;">Kembali</a>
            <div class="form-group">
                <label for="">Tanggal invoice</label>
                <input type="date" name="tanggal_invoice" class="form-control" id="tanggal-invoice" placeholder="Tanggal invoice . . .">
                @error('tanggal_invoice')
                    <div class="alert alert-danger" style="margin-top: 10px;">
                        {{-- <a href="#" class="close" id="close-alert" data-dismiss="alert" aria-label="close">&times;</a> --}}
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Grand total</label>
                <input type="number" name="grand_total" class="form-control" placeholder="Grand total . . .">
            </div>
            <div class="form-group">
                <label for="">Nama kasir</label>
                <input type="text" name="nama_kasir" class="form-control" placeholder="Nama kasir . . .">
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nama barang</th>
                        <th>Jumlah pembelian</th>
                        <th>Harga satuan</th>
                        <th>Harga total</th>
                        <th>
                            <a href="#" class="btn btn-success btn-sm" id="add-row" data-toggle="tooltip" data-placement="top" title="Add row"><i class="fas fa-plus-circle"></i></a>
                        </th>
                        {{-- <th>Invoice id</th> --}}
                    </tr>
                </thead>
                <tbody id="table-detail">
                    <tr>
                        <td><input type="text" name="nama_barang[]" class="form-control" id="nama-barang" placeholder="Nama barang . . ."></td>
                        <td><input type="number" name="jumlah_pembelian[]" class="form-control" id="jumlah-pembelian" placeholder="Jumlah pembelian . . ."></td>
                        <td><input type="number" name="harga_satuan[]" class="form-control" id="harga-satuan" placeholder="Harga satuan . . ."></td>
                        <td><input type="number" name="harga_total[]" class="form-control" id="harga-total" onfocus="" readonly placeholder="Harga total . . ."></td>
                        <td><a class="btn btn-danger btn-sm" id="remove-row"><i class="fas fa-minus-circle"></i></a></td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>

    <script>
        $('#tanggal-invoice').change(function(){
            $('.alert-danger').hide();
        });     
        $('#add-row').on('click', function(){
            addRow();
        });
        
        $('#remove-row').live('click', function(){
            var rowOne = $('tbody tr').length;
            if (rowOne == 1) {  
                alert("You can't deleted row one");
            } else{
                $(this).parent().parent().remove();
            }
        });

        $('tbody').delegate('#jumlah-pembelian, #harga-satuan', 'keyup', function(){
            var tr = $(this).parent().parent();
            var jumlahPembelian = tr.find('#jumlah-pembelian').val();
            var hargaSatuan     = tr.find('#harga-satuan').val();
            var hargaTotal      = (jumlahPembelian * hargaSatuan);
            tr.find('#harga-total').val(hargaTotal);
        });

        function addRow() {
            var row = '<tr>';
                row += '<td><input type="text" name="nama_barang[]" class="form-control" id="nama-barang" placeholder="Nama barang . . ."></td>';
                row += '<td><input type="number" name="jumlah_pembelian[]" class="form-control" id="jumlah-pembelian" placeholder="Jumlah pembelian . . ."></td>';
                row += '<td><input type="number" name="harga_satuan[]" class="form-control" id="harga-satuan" placeholder="Harga satuan . . ."></td>';
                row += '<td><input type="number" name="harga_total[]" class="form-control" id="harga-total" readonly placeholder="Harga total . . ."></td>';
                row += '<td><a class="btn btn-danger btn-sm" id="remove-row" data-toggle="tooltip" data-placement="top" title="Minus row"><i class="fas fa-minus-circle"></i></a></td>';
                $('#table-detail').append(row);
        };
    </script>

@endsection