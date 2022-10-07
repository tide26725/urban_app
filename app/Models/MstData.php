<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstData extends Model
{
    use HasFactory;

    protected $primaryKey = 'mst_id';

    protected $fillable = [
        'mst_id',
        'mst_group_id',
        'mst_name',

    ];
}
