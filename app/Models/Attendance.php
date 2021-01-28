<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id',
        'month',
        'type',
        'score'
    ];

    protected $appends = ['total_days', 'total_present', 'total_absent'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function getTotalDaysAttribute()
    {
        

    }
}
