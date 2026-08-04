<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [

        'category_id',
        'pharmacy_id',
        'medicine_name',
        'manufacturer',
        'batch_no',
        'expiry_date',
        'mrp',
        'stock',
        'availability',
        'description',

    ];

    // Medicine belongs to Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Medicine belongs to Pharmacy
    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class);
    }

    // Medicine has many Purchases
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    // Medicine has many Sales
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
