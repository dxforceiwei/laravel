<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductNameTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'product_name';

    /**
     * Run the migrations.
     * @table product_name
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('kind');
            $table->text('product_name');
            $table->integer('reserve')->comment('庫存數量');
            $table->text('description')->nullable()->default(null)->comment('描述');
            $table->text('filename');
            $table->integer('filesize');
            $table->text('filetype');
            $table->text('filepath');
            $table->text('serial_number')->nullable()->default(null);
            $table->text('LY_name')->nullable()->default(null)->comment('凌越庫存產品名');
            $table->integer('reference')->default('0')->comment('請求凌月修改參考值');
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
