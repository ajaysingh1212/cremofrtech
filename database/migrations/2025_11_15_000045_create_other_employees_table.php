<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('other_employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone_number')->unique();
            $table->date('date_of_joining');
            $table->string('salary')->nullable();
            $table->longText('present_address')->nullable();
            $table->string('parmanent_address')->nullable();
            $table->string('aadhar')->nullable();
            $table->string('working_days')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
