<?php

namespace App;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    use SearchableTrait;
    
    protected $table = 'brands';


       protected $searchable = [
        'columns' => [
            'brands.brand_name' => 10,
            'brands.id' => 3,
        ]
    ];

    public $timestamps = false;
}
