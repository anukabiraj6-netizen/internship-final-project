<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [

        'pharmacy_id',
        'medicine_id',
        'supplier_name',
        'quantity',
        'purchase_price',
        'purchase_date',

    ];

    // Purchase belongs to Pharmacy
    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class);
    }

    // Purchase belongs to Medicine
    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
