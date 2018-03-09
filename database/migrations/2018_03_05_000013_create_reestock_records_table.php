<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReestockRecordsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'reestock_records';

    /**
     * Run the migrations.
     * @table reestock_records
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
            $table->decimal('quantity', 5, 2)->nullable();
            $table->date('reestocked_date')->nullable();
            $table->integer('concurrence')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();

            $table->index(["products_id"], 'fk_reestock_records_Products1_idx');

            $table->index(["users_id"], 'fk_reestock_records_users1_idx');


            $table->foreign('users_id', 'fk_reestock_records_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('products_id', 'fk_reestock_records_Products1_idx')
                ->references('id')->on('Products')
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
