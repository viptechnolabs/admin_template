<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->unsigned();
            $table->unsignedBigInteger('clg_id')->unsigned();
            $table->string('certificate_no', 22)->unique()->default('CR/1/0001');
            $table->string('name');
            $table->date('issue_dob');
            $table->string('stream');
            $table->enum('language', ['english', 'hindi']);
            $table->string('passing_year');
            $table->string('grade');
            $table->timestamps();
            $table->foreign('student_id')->references('id')->on('students');
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
        Schema::dropIfExists('certificates');
    }
}
