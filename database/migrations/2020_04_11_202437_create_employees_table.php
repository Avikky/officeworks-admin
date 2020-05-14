<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('surname');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('fullname')->nullable();
            $table->string('email')->unique();
            $table->string('address');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('gender');
            $table->string('disable');
            $table->integer('age')->nullable();
            $table->string('department')->nullable();
            $table->string('department_section')->nullable();
            $table->string('staff_id');
            $table->string('profile_pic')->nullable();
            $table->string('position')->nullable();
            $table->string('projects_done')->nullable();
            $table->string('expenses')->nullable();
            $table->string('is_sectional_head')->default('false');
            $table->string('is_hod')->default('false');
            $table->rememberToken();
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
        Schema::dropIfExists('employees');
    }
}
