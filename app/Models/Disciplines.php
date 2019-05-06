<?php

namespace App\Models;

use RonasIT\Support\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;

class Disciplines extends Model
{
    use ModelTrait;

    protected $fillable = [
        'name',
        'teacher_id',
        'group_id'
    ];

    protected $hidden = ['pivot'];

    public function teacher()
    {
        return $this->hasOne(User::class,'id', 'teacher_id');
    }

    public function group()
    {
        return $this->hasOne(Groups::class);
    }
}