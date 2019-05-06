<?php

namespace App\Http\Requests\Criteria;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Services\CriterionService;
use Illuminate\Foundation\Http\FormRequest;

class DeleteCriterionRequest extends FormRequest
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

        $service = app(CriterionService::class);

        if (!$service->exists(['id' => $this->route('id')])) {
            throw new NotFoundHttpException('Criterion does not exist');
        }
    }
}