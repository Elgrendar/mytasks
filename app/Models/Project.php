<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'status', 'desktop_id'];

    // Relación con el modelo Escritorio
    public function desktop()
    {
        return $this->belongsTo(Desktop::class);
    }

    // Relación con el modelo Task
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }


}
