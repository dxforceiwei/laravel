<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddServiceTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'add_service';

    /**
     * Run the migrations.
     * @table add_service
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
            $table->text('kind')->comment('貨品種類');
            $table->text('person')->nullable()->default(null)->comment('購買人');
            $table->text('buy_date')->nullable()->default(null)->comment('購買日期');
            $table->text('over_date')->nullable()->default(null)->comment('保固到期日');
            $table->text('over_date2')->nullable()->default(null)->comment('充電器保固');
            $table->text('address')->nullable()->default(null)->comment('通訊地址');
            $table->text('buy_company')->nullable()->default(null)->comment('購買店家');
            $table->text('car_name')->nullable()->default(null)->comment('車廠/車款型號');
            $table->text('car_id')->nullable()->default(null)->comment('車款型號');
            $table->text('person_tel')->nullable()->default(null)->comment('市話');
            $table->text('person_phone')->nullable()->default(null)->comment('行動電話');
            $table->text('car_num')->nullable()->default(null)->comment('車架號碼');
            $table->text('battery_name')->nullable()->default(null)->comment('電池型號');
            $table->text('battery_num')->nullable()->default(null)->comment('電池號碼');
            $table->text('replenisher_num')->nullable()->default(null)->comment('充電器號碼');
            $table->text('ps')->nullable()->default(null)->comment('備註');
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
