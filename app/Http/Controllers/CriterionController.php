<?php

namespace App\Http\Controllers;

use App\Http\Requests\Criteria\CreateCriterionRequest;
use App\Http\Requests\Criteria\GetCriterionRequest;
use App\Http\Requests\Criteria\UpdateCriterionRequest;
use App\Http\Requests\Criteria\DeleteCriterionRequest;
use App\Http\Requests\Criteria\SearchCriterionRequest;
use App\Services\CriterionService;
use Symfony\Component\HttpFoundation\Response;

class CriterionController extends Controller
{
    public function create(CreateCriterionRequest $request, CriterionService $service)
    {
        $data = $request->all();

        $result = $service->create($data);

        return response()->json($result);
    }

    public function get(GetCriterionRequest $request, CriterionService $service, $id)
    {
        $result = $service
            ->withRelations($request->input('with', []))
            ->find($id);

        return response()->json($result);
    }

    public function update(UpdateCriterionRequest $request, CriterionService $service, $id)
    {
        $service->update($id, $request->all());

        return response('', Response::HTTP_NO_CONTENT);
    }

    public function delete(DeleteCriterionRequest $request, CriterionService $service, $id)
    {
        $service->delete($id);

        return response('', Response::HTTP_NO_CONTENT);
    }

    public function search(SearchCriterionRequest $request, CriterionService $service)
    {
        $result = $service->search($request->all());

        return response($result);
    }
}