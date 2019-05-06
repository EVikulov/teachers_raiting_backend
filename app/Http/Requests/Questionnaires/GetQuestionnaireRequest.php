<?php

namespace App\Http\Requests\Questionnaires;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Services\QuestionnaireService;
use Illuminate\Foundation\Http\FormRequest;

class GetQuestionnaireRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
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