<?php

namespace App\Http\Requests\Disciplines;

use Illuminate\Foundation\Http\FormRequest;

class CreateDisciplinesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'string|required',
        ];
    }
}