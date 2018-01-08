<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplier_products extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'supplier_products';

     /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    // public function product_supplier(){
    //     return $this->hasMany('App\Products');
    // }
}
