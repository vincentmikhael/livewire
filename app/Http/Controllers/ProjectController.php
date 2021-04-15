<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function update($id, Request $request)
    {
        try {
            $project = Project::where('id', $id);
            if ($request->hasFile('images')) {
                Storage::delete('public/' . $project->first()->image);

                $url = $request->images->store('project', 'public');
                $request['image'] = $url;
            }
            $project->update($request->except(['_method', '_token', 'images']));
            return redirect()->back()->with('success', 'Data berhasil diperbarui');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Data gagal diubah! Pastikan semua form terisi dengan benar');
        }
    }

    public function delete($id)
    {
        $project = Project::where('id', $id);
        Storage::delete('public/' . $project->first()->image);
        Project::destroy($id);
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
