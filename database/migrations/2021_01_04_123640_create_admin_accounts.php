<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAdminAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'shielasoriano@gmail.com',
            'password' => '$2y$10$AXVvBVWXSIJkZDfsjHUnWeTGV5qzKNRelsn4Qchg5rhTUjVPtfgWm',
            'role' => 'Administrator',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'Principal',
            'email' => 'quelizasheryl@gmail.com',
            'role' => 'Principal',
            'password' => '$2y$10$AXVvBVWXSIJkZDfsjHUnWeTGV5qzKNRelsn4Qchg5rhTUjVPtfgWm',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
