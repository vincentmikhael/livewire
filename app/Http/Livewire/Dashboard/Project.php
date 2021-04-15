<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Project as ModelsProject;
use Livewire\Component;
use Livewire\WithFileUploads;

class Project extends Component
{
    use WithFileUploads;
    public $data = [
        "projectname" => "",
        "id" => "",
        "address" => "",
        "image" => "",
        "status" => ""
    ];
    public $image;

    protected $rules = [
        "data.projectname" => "required",
        "data.id" => "required",
        "data.address" => "required",
        "image" => "required|image",
        "data.status" => "required"
    ];


    public function submit()
    {
        $this->validate();
        $this->data['image'] = $this->image->store('project', 'public');

        $this->data['created_by'] = 1;
        $this->data['updated_by'] = 1;

        ModelsProject::create($this->data);
        session()->flash('success', 'Data berhasil ditambahkan');
        return redirect()->route('dashboard.project');
    }

    public function render()
    {
        return view('livewire.dashboard.project')->layout('layouts.dashboard');
    }
}
