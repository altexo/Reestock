<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'lists';

    /**
     * Run the migrations.
     * @table lists
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('list_name', 45);
            $table->integer('reestock_currency');
            $table->date('reestock_date');
            $table->tinyInteger('status')->nullable();

            /*$table->index(["client_ID"], 'fk_lists_clients_idx');*/
            $table->timestamps();


           /* $table->foreign('client_ID', 'fk_lists_clients_idx')
                ->references('client_ID')->on('clients')
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
