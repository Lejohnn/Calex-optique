<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCallInteraction extends Model
{
    protected $fillable = [
        'client_id',
        'type',
        'details',
        'interaction_date',
    ];

    // Convertit la valeur de interaction_date en objet Carbon
    protected $dates = ['interaction_date'];

    // Mutateur pour formater la date lorsqu'elle est récupérée
    public function getInteractionDateAttribute($value)
    {
        // Vérifie si la valeur est déjà un objet Carbon
        if ($value instanceof Carbon) {
            return $value->format('d/m/Y');
        }

        // Si ce n'est pas un objet Carbon, essayez de le convertir
        return Carbon::parse($value)->format('d/m/Y');
    }


}
