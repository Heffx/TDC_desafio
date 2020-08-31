<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
      'name', 'document_number', 'address', 'phone', 'user_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Product()
    {
        return $this->hasMany(Product::class);
    }

    public function Ranking()
    {
        return $this->belongsTo(Ranking::class);
    }
}
