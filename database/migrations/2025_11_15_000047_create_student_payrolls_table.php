<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentPayrollsTable extends Migration
{
    public function up()
    {
        Schema::create('student_payrolls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('course_amount');
            $table->decimal('paid_amount', 15, 2)->nullable();
            $table->decimal('due_amount', 15, 2)->nullable();
            $table->date('due_date')->nullable();
            $table->date('paid_date')->nullable();
            $table->longText('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
