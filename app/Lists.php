<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    protected $table = 'lists';

    public function list_products()
    {
    	return $this->hasMany(List_products::class);
    }

    public function User()
    {
    	return $this->belongsTo();
    }
}
