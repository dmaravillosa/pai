<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSchoolYearConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_year_configs', function (Blueprint $table) {
            $table->id();
            $table->string('school_year');
            $table->integer('quarter');
            $table->timestamps();
        });

        DB::table('school_year_configs')->insert([
            'school_year' => '2020-2021',
            'quarter' => '1'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_year_configs');
    }
}
