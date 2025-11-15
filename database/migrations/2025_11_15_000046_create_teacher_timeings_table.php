<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherTimeingsTable extends Migration
{
    public function up()
    {
        Schema::create('teacher_timeings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->time('classes_timeing')->nullable();
            $table->string('selecte_days')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
