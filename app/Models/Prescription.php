<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_patient',
        'age',
        'date',
        'sph_od',
        'cyl_od',
        'axe_od',
        'add_od',
        'sph_og',
        'cyl_og',
        'axe_og',
        'add_og',
    ];

    protected $dates = ['date'];
}
