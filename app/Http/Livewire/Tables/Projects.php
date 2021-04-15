<?php

namespace App\Http\Livewire\Tables;

use App\Models\Project;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class Projects extends LivewireDatatable
{
    public $exportable = true;

    public function builder()
    {
        return Project::query()->leftJoin('users', 'users.id', 'projects.created_by');
    }

    public function columns()
    {
        return [
            Column::name('id')
                ->searchable(),
            Column::name('projectname')
                ->searchable(),
            Column::name('address')
                ->searchable(),
            Column::callback(['image'], function ($image) {
                return '<img style="width: 80px;" src=' . asset("storage/" . $image) . '>';
            })->label('Image'),
            Column::name('status'),
            Column::name('users.name'),
            Column::callback(['id'], function ($id) {
                return view('tables.project', ['project' => Project::where('id', $id)->first(), 'id' => $id]);
            })

        ];
    }
}
