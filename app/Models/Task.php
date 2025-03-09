<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'status', 'project_id'];

    // Relación con el modelo Project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
