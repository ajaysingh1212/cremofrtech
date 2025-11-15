<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone_number')->unique();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('dob');
            $table->string('gender')->nullable();
            $table->string('qualification');
            $table->longText('parmanet_address')->nullable();
            $table->string('present_address')->nullable();
            $table->date('date_of_joing')->nullable();
            $table->decimal('course_fee', 15, 2)->nullable();
            $table->string('discount_type')->nullable();
            $table->decimal('discount', 15, 2)->nullable();
            $table->string('due_amount')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
