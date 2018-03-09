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
            $table->integer('users_id');
            $table->integer('products_id');
            $table->decimal('quantity', 5, 2);
            $table->integer('reestock_concurrence');
            $table->dateTime('reestock_date');
            $table->integer('active');
            $table->integer('auto_reestock')->nullable();
            $table->timestamps();

            $table->index(["users_id"], 'fk_list_products_users1_idx');

            $table->index(["products_id"], 'fk_list_products_Products1_idx');


            $table->foreign('products_id', 'fk_list_products_Products1_idx')
                ->references('id')->on('Products')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('users_id', 'fk_list_products_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
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