<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('section_name');
            $table->string('department_id');
            $table->string('reason_for_creation')->nullable();
            $table->string('section_goal')->nullable();
            $table->string('section_strength')->nullable();
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
        Schema::dropIfExists('department_sections');
    }
}
