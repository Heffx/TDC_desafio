<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
      'name', 'document_number', 'address', 'phone',
    ];

    public function Product()
    {
        return $this->hasMany(Product::class);
    }

    public function Ranking()
    {
        return $this->belongsTo(Ranking::class);
    }
}
