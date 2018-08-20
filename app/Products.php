<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\supplier_products;
use Nicolaslopezj\Searchable\SearchableTrait;
class Products extends Model
{

  
   use SearchableTrait;

       protected $searchable = [
        'columns' => [
            'products.product_name' => 10,
            'products.brand' => 5,
            'products.id' => 3,
            'tags.tag_name' => 8,
        ],
        'joins' => [
            'tag_products' => ['products.id', 'tag_products.products_id'],
            'tags' => ['tag_products.tags_id','tags.id'],
        ],
    ];

    protected $table = 'products';


    public $timestamps = false;

    public function modelFilter(){
        return $this->provideFilter(App\ModelFilters\ProductsFilter::class);
    }

    public function supplier(){
        return $this->hasMany(supplier_products::class);
        //return $this->hasMany(supplier_products::class)->where('supplier_products.id', 2);
    } 

    public function departments(){
        return $this->belongsTo('App\Departments', 'departments_id');
    }
}
