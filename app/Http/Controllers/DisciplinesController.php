<?php

namespace App\Http\Controllers;

use App\Http\Requests\Disciplines\CreateDisciplinesRequest;
use App\Http\Requests\Disciplines\GetDisciplinesRequest;
use App\Http\Requests\Disciplines\UpdateDisciplinesRequest;
use App\Http\Requests\Disciplines\DeleteDisciplinesRequest;
use App\Http\Requests\Disciplines\SearchDisciplinesRequest;
use App\Services\DisciplinesService;
use Symfony\Component\HttpFoundation\Response;

class DisciplinesController extends Controller
{
    public function create(CreateDisciplinesRequest $request, DisciplinesService $service)
    {
        $data = $request->all();

        $result = $service->create($data);

        return response()->json($result);
    }

    public function get(GetDisciplinesRequest $request, DisciplinesService $service, $id)
    {
        $result = $service
            ->withRelations($request->input('with', []))
            ->find($id);

        return response()->json($result);
    }

    public function update(UpdateDisciplinesRequest $request, DisciplinesService $service, $id)
    {
        $service->update($id, $request->all());

        return response('', Response::HTTP_NO_CONTENT);
    }

    public function delete(DeleteDisciplinesRequest $request, DisciplinesService $service, $id)
    {
        $service->delete($id);

        return response('', Response::HTTP_NO_CONTENT);
    }

    public function search(SearchDisciplinesRequest $request, DisciplinesService $service)
    {
        $result = $service->search($request->all());

        return response($result);
    }
}