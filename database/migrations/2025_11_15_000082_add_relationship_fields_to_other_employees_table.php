<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOtherEmployeesTable extends Migration
{
    public function up()
    {
        Schema::table('other_employees', function (Blueprint $table) {
            $table->unsignedBigInteger('select_employee_id')->nullable();
            $table->foreign('select_employee_id', 'select_employee_fk_10762290')->references('id')->on('users');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_10762301')->references('id')->on('users');
        });
    }
}
