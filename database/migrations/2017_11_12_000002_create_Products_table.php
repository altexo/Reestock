<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'products';

    /**
     * Run the migrations.
     * @table Products
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('SKU', 45)->nullable();
            $table->string('bar_code', 45);
            $table->string('brand', 200)->nullable();
            $table->string('product_name', 200);
            $table->string('unity', 50)->nullable();
            $table->string('product_description', 70)->nullable();
            $table->decimal('product_onStock', 5, 2)->nullable();
            $table->decimal('product_inOrder', 5, 2)->nullable();
            $table->string('product_img', 200)->nullable();
            $table->integer('active')->default(1);     
            $table->integer('department_id')->unsigned();

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
