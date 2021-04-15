<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'invoiced';
    protected $fillable = ['id', 'type_bill', 'seq', 'vat', 'net', 'total'];
}
