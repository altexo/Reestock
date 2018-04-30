<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sub_categories;
class Categories extends Model
{
    public function sub_categories()
	{
    	return $this->hasMany(Sub_categories::class);
	}
}
