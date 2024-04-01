<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncadrementStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encadrement_student', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('encadrement_id')->constrained()->onDelete('cascade');
            // $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('encadrement_id');
            $table->foreign('encadrement_id')->references('id')->on('encadrements');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encadrement_student');
    }
}
