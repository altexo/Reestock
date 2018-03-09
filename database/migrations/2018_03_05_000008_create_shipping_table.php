<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'shipping';

    /**
     * Run the migrations.
     * @table shipping
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
            $table->string('name', 191)->nullable();
            $table->string('last_name', 191)->nullable();
            $table->string('address', 191)->nullable();
            $table->string('colony', 191)->nullable();
            $table->string('state', 191)->nullable();
            $table->string('city', 191)->nullable();
            $table->string('country', 191)->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('phone', 20)->nullable();
            $table->timestamps();
            $table->index(["users_id"], 'fk_shipping_users1_idx');


            $table->foreign('users_id', 'fk_shipping_users1_idx')
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
