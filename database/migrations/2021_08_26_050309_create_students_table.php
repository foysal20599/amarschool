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
            $table->string('student_name');
            $table->date('date_of_birth');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('religion')->nullable();
            $table->tinyInteger('gender');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('division_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('upazilla_id')->nullable();
            $table->unsignedBigInteger('union_id')->nullable();
            $table->string('phone_no')->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('agent_id');
            $table->boolean('status')->default(0)->nullable();
            $table->boolean('is_active')->default(0)->nullable();
            $table->timestamps();
            $table->foreign('agent_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('class_models')->onDelete('cascade');

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
