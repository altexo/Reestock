<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

     /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function supplier(){
        return $this->hasMany(App\supplier_products::class);
    } 
}
