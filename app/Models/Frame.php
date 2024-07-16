<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frame extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'brand_id','status',
    ];

     // Ajouter la méthode toggleStatus
     public function toggleStatus()
    {
        $this->status = !$this->status;
        $this->save();
    }

    // Ajoutez cette méthode pour définir la relation belongsTo
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
