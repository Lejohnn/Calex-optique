<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_reception',
        'montant_du',
        'montant',
        'reste',
        'nom_client',
        'autre_versement', 
    ];
}
