<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->date('application_date');
            $table->date('transfer_date')->nullable();
            $table->string('from_MDA');
            $table->string('to_MDA');
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->unsignedBigInteger('applied_by')->nullable();
            $table->string('present_appointment')->nullable();
            $table->string('present_gl_salary')->nullable();
            $table->string('education_qualification')->nullable();
            $table->string('last_promotion')->nullable();
            $table->string('gazette_or_notice')->nullable();
            $table->string('comment')->nullable();
            $table->boolean('self_apply')->default(false); // Flag for self-application
            $table->string('status')->default('Pending'); // pending, approved, rejected
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('approved_by')->references('id')->on('users');
            $table->foreign('applied_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfers');
    }
};
