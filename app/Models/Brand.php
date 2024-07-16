<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Ajoutez cette méthode pour définir la relation hasMany
    public function frames()
    {
        return $this->hasMany(Frame::class);
    }
}   
