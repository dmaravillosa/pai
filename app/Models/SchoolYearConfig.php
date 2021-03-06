<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYearConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'quarter',
        'school_year',
        'is_active'
    ];
}
