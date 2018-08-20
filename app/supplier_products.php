<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
class supplier_products extends Model
{

    use SearchableTrait;

    protected $table = 'supplier_products';

     protected $searchable = [
        'columns' => [
            // 'supplier_products.purchase_price' => 2,
            // 'supplier_products.last_name' => 10,
            // 'supplier_products.bio' => 2,
            // 'supplier_products.email' => 5,
            'products.product_name' => 10,
            'products.brand' => 5,
            'products.id' => 3,
            'tags.tag_name' => 8,
        ],
        'joins' => [
            'products' => ['supplier_products.products_id','products.id'],
            'tag_products' => ['products.id', 'tag_products.products_id'],
            'tags' => ['tag_products.tags_id','tags.id'],
        ],
    ];
    public $timestamps = false;

    // public function product_supplier(){
    //     return $this->hasMany('App\Products');
    // }
}
