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
        'date_rdv',
        'rubrique',
        'entreprise_nom',
        'entreprise_responsable',
        'entreprise_contact',
        'entreprise_heure',
        'rdv_heure',
        'user_id',
        'statut',
        'commercial_id', // Ajoutez cette ligne
        'validation_status',
        'validation_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function commercial()
    {
        return $this->belongsTo(Commercial::class);
    }

    protected static function booted()
    {
        static::creating(function ($prospect) {
            $commercial = $prospect->commercial;
            if ($commercial) {
                $prospect->commercial_name = $commercial->full_name;
            }
        });

        static::updating(function ($prospect) {
            $commercial = $prospect->commercial;
            if ($commercial) {
                $prospect->commercial_name = $commercial->full_name;
            }
        });
    }
}
