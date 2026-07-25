<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class MakeEmployeeSpaFieldsNullable extends Migration
{
    public function up()
    {
        DB::statement("ALTER TABLE employees MODIFY emp_faculty VARCHAR(255) NULL");
        DB::statement("ALTER TABLE employees MODIFY emp_dep VARCHAR(255) NULL");
        DB::statement("ALTER TABLE employees MODIFY emp_position VARCHAR(255) NULL");
        DB::statement("ALTER TABLE employees MODIFY emp_position_code VARCHAR(255) NULL");
        DB::statement("ALTER TABLE employees MODIFY emp_phone VARCHAR(255) NULL");
        DB::statement("ALTER TABLE employees MODIFY status VARCHAR(255) NOT NULL DEFAULT 'active'");
    }

    public function down()
    {
        DB::statement("ALTER TABLE employees MODIFY emp_faculty VARCHAR(255) NOT NULL");
        DB::statement("ALTER TABLE employees MODIFY emp_dep VARCHAR(255) NOT NULL");
        DB::statement("ALTER TABLE employees MODIFY emp_position VARCHAR(255) NOT NULL");
        DB::statement("ALTER TABLE employees MODIFY emp_position_code VARCHAR(255) NOT NULL");
        DB::statement("ALTER TABLE employees MODIFY emp_phone VARCHAR(255) NOT NULL");
        DB::statement("ALTER TABLE employees MODIFY status VARCHAR(255) NOT NULL");
    }
}
