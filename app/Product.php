<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'amount',
    ];

    public function Store()
    {
        return $this->belongsTo(Store::class);
    }

    public function Ranking()
    {
        return $this->belongsTo(Ranking::class);
    }
}
