<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductListTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'product_list';

    /**
     * Run the migrations.
     * @table product_list
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('date')->comment('日期	');
            $table->text('company')->nullable()->default(null);
            $table->text('push_date')->comment('出貨日期');
            $table->text('car_name')->nullable()->default(null)->comment('車廠');
            $table->text('car_id')->nullable()->default(null)->comment('車款型號	');
            $table->text('car_num')->nullable()->default(null)->comment('車架號碼');
            $table->text('battery_name')->nullable()->default(null)->comment('電池型號');
            $table->text('battery_num')->nullable()->default(null)->comment('電池號碼');
            $table->text('replenisher_num')->nullable()->default(null)->comment('充電器號碼');
            $table->text('ps')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
