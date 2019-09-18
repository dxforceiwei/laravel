<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'admin';

    /**
     * Run the migrations.
     * @table admin
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('serial_number')->nullable()->default(null)->comment('客戶編號');
            $table->text('company')->comment('客戶名稱');
            $table->text('nickname')->nullable()->default(null)->comment('暱稱');
            $table->text('username')->comment('客戶統編');
            $table->text('password');
            $table->text('permission')->comment('權限');
            $table->text('contact_person')->comment('聯絡人');
            $table->text('e-mail')->comment('信箱');
            $table->text('phone_number')->comment('客戶電話');
            $table->text('fax_number')->nullable()->default(null)->comment('客戶傳真');
            $table->text('address')->comment('送貨地址');
            $table->integer('buy')->default('0')->comment('訂購權限');
            $table->integer('fix')->default('0')->comment('維修權限');
            $table->integer('submit')->default('0')->comment('註冊保固權限');
            $table->text('up')->nullable()->default(null)->comment('上級單位');
            $table->text('line_token')->nullable()->default(null)->comment('line通知服務');
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
