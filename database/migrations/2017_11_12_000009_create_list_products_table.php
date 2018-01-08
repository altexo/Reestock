<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListProductsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'list_products';

    /**
     * Run the migrations.
     * @table list_products
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('lists_id')->unsigned();
            $table->integer('products_id')->unsigned();
            $table->decimal('quantity', 5, 2)->nullable();

          /*  $table->index(["products_ID"], 'fk_list_products_Products1_idx');


            $table->foreign('products_ID', 'fk_list_products_Products1_idx')
                ->references('products_ID')->on('Products')
                ->onDelete('no action')
                ->onUpdate('no action');*/
        });
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
