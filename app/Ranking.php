<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    protected $fillable = [
        'rating','comment','product_id','store_id'
    ];

    public function Store()
    {
        return $this->hasMany(Store::class);
    }

    public function Product()
    {
        return $this->hasMany(Product::class);
    }
}
