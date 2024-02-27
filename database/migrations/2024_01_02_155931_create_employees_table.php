<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration {
    public function up() {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('staff_id')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('file_number')->unique();
            $table->date('dob');
            $table->string('gender');
            $table->string('state');
            $table->string('lga');
            $table->string('mda');
            $table->unsignedBigInteger('added_by')->nullable();
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('last_update_by')->nullable();
            $table->foreign('last_update_by')->references('id')->on('users')->onDelete('set null');
            $table->string('highest_qualification');
            $table->date('first_appointment_date');
            $table->string('current_rank');
            $table->string('status')->default('Active'); // active, retired, Probation
            $table->date('status_changed_date')->now();
            $table->date('last_promotion_date');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('employees');
    }
}
