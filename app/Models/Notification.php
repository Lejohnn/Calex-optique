<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message',
        'status',
        'visibility',
        'user_id',
        'client_id',
        'created_at',
        'updated_at'

    ];



    public function user()
    {
        return $this->belongsTo(User::class); // Replace User with your actual model name
    }

    public function client()
    {
        return $this->belongsTo(Client::class); // Replace User with your actual model name
    }

}
