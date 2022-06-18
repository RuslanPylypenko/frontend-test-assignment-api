<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property string photo
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'photo',
        'position_id'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }

    public function getPhoto()
    {
       return asset('storage/images/users/' . $this->photo);
    }

}
