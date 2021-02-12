<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOldSchoolYears extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('school_year_configs')->insert([
            'school_year' => '2003-2004',
            'quarter' => 1,
            'is_active' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('school_year_configs')->insert([
            'school_year' => '2004-2005',
            'quarter' => 1,
            'is_active' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('school_year_configs')->insert([
            'school_year' => '2005-2006',
            'quarter' => 1,
            'is_active' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('school_year_configs')->insert([
            'school_year' => '2006-2007',
            'quarter' => 1,
            'is_active' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('school_year_configs')->insert([
            'school_year' => '2007-2008',
            'quarter' => 1,
            'is_active' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('school_year_configs')->insert([
            'school_year' => '2008-2009',
            'quarter' => 1,
            'is_active' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('school_year_configs')->insert([
            'school_year' => '2009-2010',
            'quarter' => 1,
            'is_active' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('school_year_configs')->insert([
            'school_year' => '2010-2011',
            'quarter' => 1,
            'is_active' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('school_year_configs')->insert([
            'school_year' => '2011-2012',
            'quarter' => 1,
            'is_active' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('school_year_configs')->insert([
            'school_year' => '2012-2013',
            'quarter' => 1,
            'is_active' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('school_year_configs')->insert([
            'school_year' => '2013-2014',
            'quarter' => 1,
            'is_active' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('school_year_configs')->insert([
            'school_year' => '2014-2015',
            'quarter' => 1,
            'is_active' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('school_year_configs')->insert([
            'school_year' => '2015-2016',
            'quarter' => 1,
            'is_active' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('school_year_configs')->insert([
            'school_year' => '2016-2017',
            'quarter' => 1,
            'is_active' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('school_year_configs')->insert([
            'school_year' => '2017-2018',
            'quarter' => 1,
            'is_active' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('school_year_configs')->insert([
            'school_year' => '2018-2019',
            'quarter' => 1,
            'is_active' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('school_year_configs')->insert([
            'school_year' => '2019-2020',
            'quarter' => 1,
            'is_active' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
