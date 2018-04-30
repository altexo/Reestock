<?php

namespace App;
use App\Categories;

use Illuminate\Database\Eloquent\Model;

class Sub_categories extends Model
{
    protected $table = 'sub_categories';

    public function categories()
	{
    	return $this->belongsTo(Categories::class);
	}
}
