<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'brands';

    /**
     * Run the migrations.
     * @table brands
     *
     * @return void
     */
    public function up()
    {
        // if (Schema::hasTable($this->set_schema_table)) return;
        // Schema::create($this->set_schema_table, function (Blueprint $table) {
        //     $table->engine = 'InnoDB';
        //     $table->increments('id');
        //     $table->string('brand_name', 45)->nullable();
        //    // $table->integer('products_ID');

        //   /*  $table->index(["products_ID"], 'fk_brands_Products1_idx');


        //     $table->foreign('products_ID', 'fk_brands_Products1_idx')
        //         ->references('products_ID')->on('Products')
        //         ->onDelete('no action')
        //         ->onUpdate('no action');*/
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
