<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSnNumTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'sn_num';

    /**
     * Run the migrations.
     * @table sn_num
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('kind')->comment('類別');
            $table->text('name')->comment('型號');
            $table->integer('visable')->default('1')->comment('隱藏0=false, 1=true');
            $table->integer('com_visable')->default('0')->comment('經銷商瀏覽0=可看, 1=隱藏');
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
