<?php

namespace App\Http\Livewire\Tables;

use App\Models\InvoiceHeader;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;

class Invoiceh extends LivewireDatatable
{
    public $exportable = true;

    public function builder()
    {
        if (auth()->user()->role == 1 || auth()->user()->role == 2) {
            return InvoiceHeader::query();
        } else if (auth()->user()->role == 4) {
            return InvoiceHeader::where([
                ['project_id', auth()->user()->project_id],
                ['contract_id', auth()->user()->contract_id]
            ]);
        } else if (auth()->user()->role == 5) {
            return InvoiceHeader::where([['project_id', auth()->user()->project_id]]);
        }
    }

    public function columns()
    {
        return [
            Column::name('id')
                ->label('Invoice Number'),
            Column::name('date'),
            Column::name('duedate'),
            Column::name('contract_id')
                ->label('Contract ID'),
            Column::name('net'),
            Column::name('vat'),
            Column::name('total'),
            Column::name('project_id')
                ->label('Project ID'),
            Column::name('created_by'),
            Column::name('update_by'),
            Column::callback(['id'], function ($id) {
                return view('tables.invoiceh', ['data' => InvoiceHeader::where('id', $id)->first(), 'id' => $id]);
            })
        ];
    }
}
