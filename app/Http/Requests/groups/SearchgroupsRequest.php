<?php

namespace App\Http\Requests\Groups;

use Illuminate\Foundation\Http\FormRequest;

class SearchGroupsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'page' => 'integer|nullable',
            'per_page' => 'integer|nullable',
            'all' => 'integer|nullable',
            'query' => 'string|nullable',
            'order_by' => 'string|nullable',
            'desc' => 'boolean|nullable',
            'with' => 'array|nullable',
            'with.*' => 'string|required',
        ];//TODO after project release on prod add validation for with.* and order_by
    }
}