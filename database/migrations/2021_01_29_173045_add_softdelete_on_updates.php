<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftdeleteOnUpdates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('updates', function (Blueprint $table) {
            $table->softDeletes();
            $table->string('school_year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('updates', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
            $table->dropColumn('school_year');
        });
    }
}
