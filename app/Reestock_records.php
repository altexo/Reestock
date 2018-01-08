<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reestock_records extends Model
{
    protected $table = 'reestock_records';

    public function list_status(){
    	return $this->hasMany(App\list_status::class);
    }
}
