<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desktop extends Model
{
    use HasFactory;

    // Campos que se pueden rellenar masivamente
    protected $fillable = ['name', 'color', 'description', 'user_id'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    //Relacion con el modelo user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
