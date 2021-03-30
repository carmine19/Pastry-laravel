<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sweet extends Model
{
    public function pastries() {
        return $this->belongsTo('App\Pastry');
    }

     protected $fillable = [
        'name', 'slug', 'cover', 'description', 'ingredients', 'price', 'visibility', 'pastry_id',
    ];
}
