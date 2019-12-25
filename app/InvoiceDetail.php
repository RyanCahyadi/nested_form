<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceDetail extends Model
{
    protected $table = 'invoice_detail';

    protected $fillable = ['invoice_id', 'nama_barang', 'jumlah_pembelian', 'harga_satuan', 'harga_total'];

    // use SoftDeletes;
}
