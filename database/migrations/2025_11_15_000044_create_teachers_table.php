<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone_number')->unique();
            $table->date('date_of_joining');
            $table->string('qualification')->nullable();
            $table->decimal('salary', 15, 2);
            $table->longText('known_language')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
