<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQueryCommonUserTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'query_common_user';

    /**
     * Run the migrations.
     * @table query_common_user
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('date');
            $table->text('company')->comment('店家名稱');
            $table->text('number')->comment('單號');
            $table->text('kind')->comment('貨品種類');
            $table->text('details')->nullable()->default(null)->comment('詳細資料');
            $table->integer('amount')->comment('數量');
            $table->text('expected_time')->comment('預定出貨日');
            $table->text('others')->nullable()->default(null)->comment('備註');
            $table->text('company_details')->nullable()->default(null)->comment('廠商說明');
            $table->text('schedule')->nullable()->default(null)->comment('目前進度');
            $table->text('transport_date')->nullable()->default(null)->comment('出貨時間');
            $table->text('transport_number')->nullable()->default(null)->comment('出貨單號');
            $table->integer('send_meg')->default('0')->comment('發送生產截止通知');
            $table->integer('chk_send')->default('0')->comment('確認有無發送通知');
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
