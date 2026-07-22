<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('userid');
            $table->string('name');
            $table->string('position');
            $table->string('file_no');
            $table->string('stock_price');
            $table->string('stock_desc');
            $table->string('status');
 
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
        Schema::dropIfExists('ams');
    }
}
