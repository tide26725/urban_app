<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterCourse extends Model
{
    use HasFactory;

    protected $primaryKey = 'register_course_id';

    protected $fillable = [
        'register_course_id',
        'course_id',
        'register_id',
        'number_sequence',
        'course_name',
        'start_time',
        'end_time',
        'course_group',
        'status',
        'approved_by',
        'approved_datetime',
        'canceled_by',
        'canceled_datetime',
        'is_delete',
        'deleted_by',
        'deleted_datetime',
    ];


}
