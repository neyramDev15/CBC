<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'client_id',
        'total',
        'payement_method'
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function items(){
        return $this->hasMany(SaleItem::class);
    }

    public function saleItems() {
        return $this->hasMany(SaleItem::class);
    }
}
