<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
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
        'diagnostic',
        'prescription',
        'examen_particulier',
        'rendez_vous',
        'choix_service',
        'entretien',
        'montant',
    ];

    public function notifications()
    {
        return $this->hasMany(Notification::class); // Replace Notification with your actual model name
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'client_id'); // Replace 'Order' with your actual model name
    }

    public function factures()
    {
        return $this->hasMany(Facture::class); // Replace Facture with your actual model name
    }
}
