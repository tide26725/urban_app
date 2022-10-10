<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $primaryKey = 'register_id';

    protected $fillable = [
        'register_id',
        'prefix',
        'firstname',
        'lastname',
        'address',
        'moo',
        'village',
        'soi',
        'road',
        'district_id',
        'amphure_id',
        'province_id',
        'post_code',
        'tel_no',
        'email',
        'age',
        'residence_mst_id',
        'farmland_mst_id',
        'education_lv_mst_id',
        'career_mst_id',
        'income_mst_id',
        'reason_mst_id'
    ];
}
