<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveGradeIdFromClassroomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classroom', function (Blueprint $table) {
            $table->dropColumn('grade_id');
        });

        Schema::table('students', function (Blueprint $table) {
            $table->integer('classroom_id');
        });

        Schema::table('grades', function (Blueprint $table) {
            $table->string('school_year');
        });

        Schema::rename('classroom', 'classrooms');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classroom', function (Blueprint $table) {
            $table->integer('grade_id');
        });

        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('classroom_id');
        });

        Schema::table('grades', function (Blueprint $table) {
            $table->dropColumn('school_year');
        });

        Schema::rename('classrooms', 'classroom');
    }
}
