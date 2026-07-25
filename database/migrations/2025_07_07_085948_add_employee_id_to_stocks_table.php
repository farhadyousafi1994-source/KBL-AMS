<?php

use Illuminate\Database\Migrations\Migration;

class AddEmployeeIdToStocksTable extends Migration
{
    public function up()
    {
        // Kept for migration history. The stocks table now defines employee_id and its foreign key directly.
    }

    public function down()
    {
        // No-op: see create_stocks_table migration.
    }
}
