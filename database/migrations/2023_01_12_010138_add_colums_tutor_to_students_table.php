<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsTutorToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {

            $table->string('tutor_name')->nullable();
            $table->string('tutor_phone')->nullable();
            $table->string('tutor_rut')->nullable();
            $table->string('tutor_email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['tutor_name','tutor_phone','tutor_rut','tutor_email']);
        });
    }
}
