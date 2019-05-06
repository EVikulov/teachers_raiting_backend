<?php

namespace App\Http\Requests\Questionnaires;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuestionnaireRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'rate' => 'integer|required',
        ];
    }
}