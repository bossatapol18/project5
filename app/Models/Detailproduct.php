<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detailproduct extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'detail_product',
        'create_end'
}
