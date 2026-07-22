<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table){$table->bigIncrements('id');

            $table->unsignedBigInteger('employee_id');$table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');

            $table->date('import_date');$table->string('item_name');
            $table->string('account_pay');$table->string('item_dep');
            $table->string('item_detail');$table->string('item_quantity');
            $table->string('item_cost');$table->string('file')->nullable();

            $table->timestamps(); // Corrected typo
        });
    }

    public function down()
    {

        Schema::dropIfExists('stocks');
    }

}