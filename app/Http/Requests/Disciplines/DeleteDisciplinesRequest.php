<?php

namespace App\Http\Requests\Disciplines;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Services\DisciplinesService;
use Illuminate\Foundation\Http\FormRequest;

class DeleteDisciplinesRequest extends FormRequest
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

        $service = app(DisciplinesService::class);

        if (!$service->exists(['id' => $this->route('id')])) {
            throw new NotFoundHttpException('Disciplines does not exist');
        }
    }
}