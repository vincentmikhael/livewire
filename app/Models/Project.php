<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'projectname', 'keterangan', 'address', 'email', 'image', 'status', 'created_by', 'updated_by'];
}
