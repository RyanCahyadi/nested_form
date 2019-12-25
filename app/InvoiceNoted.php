<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;


class InvoiceNoted extends Model
{
    protected $table = 'invoice_noted';

    protected $fillable = ['tanggal_invoice', 'grand_total', 'nama_kasir'];

    // use SoftDeletes;
}
