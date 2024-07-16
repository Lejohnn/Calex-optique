<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_client',
        'date_facture',
        'produits',
        'montant_total_ht',
        'autre_nom',
        'societe',
        'telephone',
        'medecin',
        'sphere_od',
        'sphere_og',
        'cylindre_od',
        'cylindre_og',
        'axe_od',
        'axe_og',
        'add_od',
        'add_og',
        'avance',
        'reste',
        'marque_select',
        'code_select',
        'od_select',
        'od_select2',
        'og_select',
        'og_select2',
    ];

    protected $casts = [
        'produits' => 'array',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class); // Replace User with your actual model name
    }
}
