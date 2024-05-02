<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'commercial_name',
        'entreprise_nom',
        'entreprise_responsable',
        'entreprise_contact',
        'entreprise_heure',
        'rdv_nom_prenom',
        'rdv_contact',
        'rdv_societe',
        'rdv_heure',
        'nettoyage_nom_prenom',
        'nettoyage_contact',
        'nettoyage_societe',
        'nettoyage_heure',
        'user_id',
        'date_rdv',
        'statut',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
