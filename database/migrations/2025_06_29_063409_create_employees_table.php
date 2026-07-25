<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
              $table->string('emp_id');
            $table->string('emp_name');
            $table->string('emp_faculty')->nullable();
            $table->string('emp_dep')->nullable();
            $table->string('emp_position')->nullable();
            $table->string('emp_position_code')->nullable();
            $table->string('emp_phone')->nullable();
            
            $table->string('status')->default('active');
    
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
        Schema::dropIfExists('employees');
    }
}
