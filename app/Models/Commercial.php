<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commercial extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'start_date',
        'points',
    ];

    public function prospects()
    {
        return $this->hasMany(Prospect::class);
    }
}
