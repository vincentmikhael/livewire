<?php

namespace App\Http\Controllers;

use App\Models\InvoiceHeader;
use Exception;
use Illuminate\Http\Request;

class InvoicehController extends Controller
{
    public function update($id, Request $request)
    {
        try {
            InvoiceHeader::where('id', $id)->update($request->except(['_method', '_token']));
            return redirect()->back()->with('success', 'Data berhasil diubah');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Data gagal diubah! Pastikan semua form terisi dengan benar');
        }
    }

    public function delete($id)
    {
        InvoiceHeader::destroy($id);
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
