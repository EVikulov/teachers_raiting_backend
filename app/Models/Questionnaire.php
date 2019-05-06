<?php

namespace App\Models;

use RonasIT\Support\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use ModelTrait;

    protected $fillable = [
        'rate',
        'user_id',
        'teacher_id',
        'criterion_id',
        'rate'
    ];

    protected $hidden = ['pivot'];

    public function student()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function teacher()
    {
        return $this->hasOne(User::class, 'id', 'teacher_id');
    }

    public function criterion()
    {
        return $this->hasOne(Criterion::class, 'id', 'criterion_id');
    }
}