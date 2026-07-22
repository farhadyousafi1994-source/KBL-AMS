<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnassetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unassets', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->string('emp_id');
            $table->string('emp_name');
            $table->string('account_pay');
            $table->string('emp_faculty');
            $table->string('emp_dep');
            $table->string('item_name');
            $table->string('item_dep');
            $table->string('item_detail');
            $table->string('item_quantity');

            $table->integer('item_cost');
      $table->date('import_date');

            $table->string('status');
            $table->string('file');

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
        Schema::dropIfExists('unassets');
    }
}
