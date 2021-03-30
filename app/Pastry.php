<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pastry extends Model
{
    public function users() {
        return $this->belongsTo('App\User');
    }

    public function sweets() {
        return $this->hasMany('App\Sweet');
    }

    protected $fillable = [
        'name', 'user_id', 'slug', 'cover', 'address', 'phone', 'email'];
}
