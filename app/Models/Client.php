<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'carte_identite',
        'date_naissance',
        'lieu_naissance',
        'profession',
        'sexe',
        'societe_attache',
        'assurance',
        'disciplines_pratiquees',
        'date_debut',
        'activite_interpelant_vision',
        'antecedents_familiaux',
        'antecedents_chirurgicaux',
        'traitements_en_cours',
        'allergies',
        'mentions_generales',
        'portez_vous_des_lunettes',
        'besoin_changer_lunettes',
        'autre_choses',
    ];
}
