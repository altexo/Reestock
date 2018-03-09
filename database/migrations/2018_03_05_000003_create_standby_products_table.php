<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandbyProductsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'standby_products';

    /**
     * Run the migrations.
     * @table standby_products
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 191)->nullable();
            $table->string('description', 191)->nullable();
            $table->integer('department')->nullable();
            $table->string('brand', 191)->nullable();
            $table->string('unity', 191)->nullable();
            $table->string('store', 191)->nullable();
            $table->string('email', 191)->nullable();
            $table->string('image', 191)->nullable();
             $table->timestamps();
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

