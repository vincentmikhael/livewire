<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceHeader extends Model
{
    use HasFactory;
    protected $table = 'invoiceh';
    protected $fillable = ['id', 'date', 'duedate', 'contract_id', 'project_id', 'net', 'vat', 'total', 'status', 'created_by', 'update_by'];
}
