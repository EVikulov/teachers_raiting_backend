<?php

namespace App\Http\Requests\Questionnaires;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Services\QuestionnaireService;
use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionnaireRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'rate' => 'integer|nullable',
        ];
    }

    public function validateResolved()
    {
        parent::validateResolved();

        $service = app(QuestionnaireService::class);

        if (!$service->exists(['id' => $this->route('id')])) {
            throw new NotFoundHttpException('Questionnaire does not exist');
        }
    }
}