<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFixCommonUserTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'fix_common_user';

    /**
     * Run the migrations.
     * @table fix_common_user
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('date')->comment('日期');
            $table->text('company')->comment('店家名稱');
            $table->text('number')->comment('單號');
            $table->text('kind')->comment('貨品種類');
            $table->text('over')->nullable()->default(null);
            $table->text('car_name')->nullable()->default(null)->comment('車廠');
            $table->text('car_id')->nullable()->default(null)->comment('車款型號');
            $table->text('person')->nullable()->default(null)->comment('購買人');
            $table->text('buy_date')->nullable()->default(null)->comment('購買日期');
            $table->text('person_tel')->nullable()->default(null)->comment('連絡電話');
            $table->text('car_num')->nullable()->default(null)->comment('車架號碼');
            $table->text('battery_name')->nullable()->default(null)->comment('電池型號');
            $table->text('battery_num')->nullable()->default(null)->comment('電池號碼');
            $table->text('replenisher_num')->nullable()->default(null)->comment('充電器號碼');
            $table->text('parts')->comment('保固零件');
            $table->text('subject')->comment('故障說明');
            $table->text('schedule')->nullable()->default(null)->comment('目前進度');
            $table->text('schedule_subject')->nullable()->default(null)->comment('故障說明');
            $table->text('fix_dayline')->nullable()->default(null)->comment('維修截止日期');
            $table->text('get_time')->nullable()->default(null)->comment('狀態時間');
            $table->text('carry_up')->nullable()->default(null)->comment('收件時間');
            $table->text('fix_date')->nullable()->default(null)->comment('維修時間');
            $table->text('transport_date')->nullable()->default(null)->comment('出貨時間');
            $table->text('transport_number')->nullable()->default(null)->comment('出貨單號');
            $table->text('transport_number2')->nullable()->default(null)->comment('內部使用寄出運單');
            $table->integer('send_meg')->default('0')->comment('發送生產截止通知');
            $table->integer('chk_send')->default('0')->comment('確認有無發送通知');
            $table->integer('LY')->default('0')->comment('凌越串接參考');
            $table->integer('LY_over')->default('0')->comment('出貨串接凌越完修');
            $table->text('fix_num')->nullable()->default(null)->comment('維修編號');
            $table->text('service')->comment('保固期');
            $table->text('out_data')->nullable()->default(null)->comment('出廠日');
            $table->text('com')->nullable()->default(null)->comment('經銷商');
            $table->text('get_com')->nullable()->default(null)->comment('收件貨運');
            $table->text('get_num')->nullable()->default(null)->comment('收件運單');
            $table->text('happend')->nullable()->default(null)->comment('故障情況');
            $table->text('fix_ma')->nullable()->default(null)->comment('維修零件');
            $table->text('battery_ma')->nullable()->default(null)->comment('電池附件');
            $table->text('discharge')->nullable()->default(null)->comment('放電');
            $table->text('balance')->nullable()->default(null)->comment('平衡');
            $table->text('fix_person')->nullable()->default(null)->comment('維修技師');
            $table->text('qa_person')->nullable()->default(null)->comment('QA人員');
            $table->text('change_battery')->nullable()->default(null)->comment('換堪用(全新)電池號碼');
            $table->text('change_replenisher')->nullable()->default(null)->comment('換堪用(全新)充電器號碼');
            $table->text('push_com')->nullable()->default(null)->comment('寄出貨運');
            $table->text('ps')->nullable()->default(null)->comment('處理進度');
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
