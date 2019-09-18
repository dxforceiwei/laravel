<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsAddTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'news_add';

    /**
     * Run the migrations.
     * @table news_add
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('date')->comment('日期');
            $table->text('kind')->comment('種類');
            $table->text('title')->comment('標題');
            $table->text('subject')->comment('內容');
            $table->text('video')->nullable()->default(null);
            $table->text('filename1')->nullable()->default(null)->comment('附件1');
            $table->integer('filesize1')->nullable()->default(null);
            $table->text('filetype1')->nullable()->default(null);
            $table->text('filepath1')->nullable()->default(null)->comment('檔案路徑');
            $table->text('filename2')->nullable()->default(null)->comment('附件2');
            $table->integer('filesize2')->nullable()->default(null);
            $table->text('filetype2')->nullable()->default(null);
            $table->text('filepath2')->nullable()->default(null);
            $table->text('filename3')->nullable()->default(null)->comment('附件3');
            $table->integer('filesize3')->nullable()->default(null);
            $table->text('filetype3')->nullable()->default(null);
            $table->text('filepath3')->nullable()->default(null);
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
