<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clg_id')->unsigned();
            $table->string('enrollment_no', 22)->unique()->default('2021/08/0001');
            $table->string('name');
            $table->string('stream');
            $table->date('dob');
            $table->string('email');
            $table->string('contact_no');
            $table->enum('gender', ['male', 'female']);
            $table->longText('address');
            $table->timestamps();
            $table->foreign('clg_id')->references('id')->on('colleges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
