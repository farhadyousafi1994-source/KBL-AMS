<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addinfo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('file_date');
            $table->integer('emp_id');
            $table->string('account_pay');
            $table->string('account_receive');
            $table->string('position');
            $table->string('file_type');
            $table->string('item');
            $table->integer('in_qty');
            $table->integer('in_cost');
            $table->integer('out_qty');
            $table->integer('out_cost');
          
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
        Schema::dropIfExists('addinfo');
    }
}
