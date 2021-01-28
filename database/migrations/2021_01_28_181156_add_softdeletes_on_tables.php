<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftdeletesOnTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("grades", function ($table) {
            $table->softDeletes();
        });

        Schema::table("students", function ($table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("grades", function ($table) {
            $table->dropColumn('deleted_at');
        });

        Schema::table("students", function ($table) {
            $table->dropColumn('deleted_at');
        });
    }
}
