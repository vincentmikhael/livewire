<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\InvoiceHeader as ModelsInvoiceHeader;
use Livewire\Component;

class InvoiceHeader extends Component
{
    public $data = [
        "id" => "",
        "date" => "",
        "duedate" => "",
        "contract_id" => "",
        "project_id" => "",
        "net" => "",
        "vat" => "",
        "total" => "",
        "status" => "1"
    ];

    protected $rules = [
        "data.id" => 'required',
        "data.date" => 'required',
        "data.duedate" => 'required',
        "data.contract_id" => 'required',
        "data.project_id" => 'required',
        "data.net" => 'required',
        "data.vat" => 'required',
        "data.total" => 'required',
    ];

    public function submit()
    {
        $this->validate();
        $this->data['created_by'] = auth()->user()->id;
        $this->data['update_by'] = auth()->user()->id;
        ModelsInvoiceHeader::create($this->data);
        session()->flash('success', 'Data berhasil ditambahkan');
        return redirect()->route('dashboard.invoice-header');
    }

    public function render()
    {
        return view('livewire.dashboard.invoice-header')->layout('layouts.dashboard');
    }
}
