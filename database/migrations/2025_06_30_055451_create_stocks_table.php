<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->date('import_date');
            $table->string('item_name');
            $table->string('account_pay')->nullable();
            $table->string('item_dep')->nullable();
            $table->string('item_detail')->nullable();
            $table->string('item_quantity')->default('1');
            $table->string('item_cost')->nullable();
            $table->string('status')->default('available');
            $table->string('file')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
