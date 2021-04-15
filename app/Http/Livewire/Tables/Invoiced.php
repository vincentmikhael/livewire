<?php

namespace App\Http\Livewire\Tables;

use App\Http\Livewire\Dashboard\InvoiceDetail;
use App\Models\InvoiceDetail as ModelsInvoiceDetail;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;

class Invoiced extends LivewireDatatable
{
    public function builder()
    {
        return ModelsInvoiceDetail::query();
    }

    public function columns()
    {
        return [
            Column::name('id')
                ->label('Invoice Number'),
            Column::name('seq'),
            Column::name('type_bill'),
            Column::name('net'),
            Column::name('vat'),
            Column::name('total'),
            Column::callback(['id'], function ($id) {
                return view('tables.invoiced', ['data' => ModelsInvoiceDetail::where('id', $id)->first(), 'id' => $id]);
            })
        ];
    }
}
