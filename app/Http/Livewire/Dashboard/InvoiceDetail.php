<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\InvoiceDetail as ModelsInvoiceDetail;
use App\Models\InvoiceHeader;
use Livewire\Component;

class InvoiceDetail extends Component
{
    public $data = [
        "id" => '',
        'type_bill' => '',
        'net' => '',
        'seq' => '',
        'vat' => '',
        'total' => ''
    ];

    protected $rules = [
        'data.id' => 'required',
        'data.type_bill' => 'required',
        'data.net' => 'required',
        'data.seq' => '',
        'data.vat' => 'required',
        'data.total' => 'required'
    ];

    public function submit()
    {
        $this->validate();
        ModelsInvoiceDetail::create($this->data);
        InvoiceHeader::where('id', $this->data['id'])->update([
            'net' => $this->data['net'],
            'vat' => $this->data['vat'],
            'total' => $this->data['total']
        ]);
        session()->flash('success', 'Data berhasil ditambahkan');
        return redirect()->route('dashboard.invoice-detail');
    }

    public function render()
    {
        return view('livewire.dashboard.invoice-detail')->layout('layouts.dashboard');
    }
}
