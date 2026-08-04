<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pharmacy extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'pharmacy_name',
        'owner_name',
        'license_number',
        'license_file',
        'address',
        'city',
        'state',
        'phone',
        'opening_time',
        'closing_time',

    ];

    // Pharmacy belongs to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Pharmacy has many Medicines
    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }

    // Pharmacy has many Purchases
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    // Pharmacy has many Sales
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
