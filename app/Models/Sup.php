<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sup extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'sup_name',
        'sup_phone',
        'sup_add'
    ];
}
