<?php

namespace App\Models;

use RonasIT\Support\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;

class Criterion extends Model
{
    use ModelTrait;

    protected $fillable = [
        'name',
        'question_group',
        'number',
    ];

    protected $hidden = ['pivot'];

}