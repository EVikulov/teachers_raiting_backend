<?php

namespace App\Http\Requests\Criteria;

use Illuminate\Foundation\Http\FormRequest;

class CreateCriterionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'string|required',
            'question_group' => 'string|required',
            'number' => 'string|required',
        ];
    }
}