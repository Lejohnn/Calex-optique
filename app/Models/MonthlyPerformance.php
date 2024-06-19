<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyPerformance extends Model
{
    use HasFactory;

    protected $fillable = [
        'commercial_id',
        'points',
        'month',
    ];

    public function commercial()
    {
        return $this->belongsTo(Commercial::class);
    }
}
