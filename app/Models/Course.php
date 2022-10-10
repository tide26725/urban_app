<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $primaryKey = 'course_id';

    protected $fillable = [
        'course_id',
        'course_name',
        'quota',
        'quota_max',
        'start_time',
        'end_time',
        'course_group',
    ];


    
}
