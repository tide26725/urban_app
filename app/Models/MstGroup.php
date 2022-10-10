<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'mst_group_id',
        'mst_group_name',

    ];
}
