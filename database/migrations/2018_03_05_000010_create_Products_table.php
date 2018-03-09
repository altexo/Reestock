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
     * @table products
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('bar_code', 45)->nullable()->comment('        ');
            $table->string('brand', 191)->nullable();
            $table->string('product_name', 191);
            $table->string('unity', 45)->nullable();
            $table->string('product_description', 191)->nullable();
            $table->decimal('product_onStock', 5, 2)->nullable();
            $table->decimal('product_inOrder', 5, 2)->nullable();
            $table->string('product_img', 191)->nullable();
            $table->integer('active')->nullable();
            $table->integer('departments_id');
            $table->timestamps();

            $table->index(["departments_id"], 'fk_Products_departments1_idx');


            $table->foreign('departments_id', 'fk_Products_departments1_idx')
                ->references('id')->on('departments')
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