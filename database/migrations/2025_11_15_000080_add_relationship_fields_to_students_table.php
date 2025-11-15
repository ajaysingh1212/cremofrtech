<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStudentsTable extends Migration
{
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('select_user_id')->nullable();
            $table->foreign('select_user_id', 'select_user_fk_10762260')->references('id')->on('users');
            $table->unsignedBigInteger('refered_by_id')->nullable();
            $table->foreign('refered_by_id', 'refered_by_fk_10762261')->references('id')->on('users');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_10762278')->references('id')->on('users');
        });
    }
}
