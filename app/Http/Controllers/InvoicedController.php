<?php

namespace App\Http\Controllers;

use App\Models\InvoiceDetail;
use App\Models\InvoiceHeader;
use Exception;
use Illuminate\Http\Request;

class InvoicedController extends Controller
{
    public function update($id, Request $request)
    {
        try {
            InvoiceDetail::where('id', $id)->update($request->except(['_method', '_token']));
            InvoiceHeader::where('id', $request->id)->update([
                'net' => $request->net,
                'vat' => $request->vat,
                'total' => $request->total
            ]);

            return redirect()->back()->with('success', 'Data berhasil diubah');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Data gagal diubah! Pastikan semua form terisi dengan benar');
        }
    }

    public function delete($id)
    {
        InvoiceDetail::destroy($id);
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
