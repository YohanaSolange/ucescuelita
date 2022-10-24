<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->decimal('height')->nullable();//columns altura no obligatorio
            $table->decimal('weight')->nullable();//columns peso no obligatorio
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
            $table->dropColumns(['height','weight']);
            // borrar columna en casa de que falle la creación de las nuevas columnas
            
            //
        });
    }
}
