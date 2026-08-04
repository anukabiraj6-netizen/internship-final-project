<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [

        'role_id',

        'pharmacy_id',

        'name',

        'email',

        'phone',

        'password',

    ];

    protected $hidden = [

        'password',

        'remember_token',

    ];

    // User belongs to Role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // One User has One Patient
    public function patient()
    {
        return $this->hasOne(Patient::class);
    }

    // One User has One Pharmacy
    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class);
    }

    // One User has One Hospital
    public function hospital()
    {
        return $this->hasOne(Hospital::class);
    }
}
