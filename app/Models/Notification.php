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
        'role_id',
        'client_id',
        'created_at',
        'updated_at'

    ];



    public function role()
    {
        return $this->belongsTo(Role::class); // Replace User with your actual model name
    }

    public function client()
    {
        return $this->belongsTo(Client::class); // Replace User with your actual model name
    }

}
