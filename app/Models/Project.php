<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'status', 'escritorio_id'];

    // Relación con el modelo Escritorio
    public function escritorio()
    {
        return $this->belongsTo(Desktop::class);
    }

    // Relación con el modelo Task
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}

