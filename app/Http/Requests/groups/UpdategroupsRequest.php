<?php

namespace App\Http\Requests\Groups;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Services\GroupsService;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGroupsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'string|nullable',
        ];
    }

    public function validateResolved()
    {
        parent::validateResolved();

        $service = app(GroupsService::class);

        if (!$service->exists(['id' => $this->route('id')])) {
            throw new NotFoundHttpException('Groups does not exist');
        }
    }
}