<?php

namespace App\Http\Controllers;

use App\Http\Requests\Questionnaires\CreateQuestionnaireRequest;
use App\Http\Requests\Questionnaires\GetQuestionnaireRequest;
use App\Http\Requests\Questionnaires\UpdateQuestionnaireRequest;
use App\Http\Requests\Questionnaires\DeleteQuestionnaireRequest;
use App\Http\Requests\Questionnaires\SearchQuestionnaireRequest;
use App\Services\QuestionnaireService;
use Symfony\Component\HttpFoundation\Response;

class QuestionnaireController extends Controller
{
    public function create(CreateQuestionnaireRequest $request, QuestionnaireService $service)
    {
        $data = $request->all();

        $result = $service->create($data);

        return response()->json($result);
    }

    public function get(GetQuestionnaireRequest $request, QuestionnaireService $service, $id)
    {
        $result = $service
            ->withRelations($request->input('with', []))
            ->find($id);

        return response()->json($result);
    }

    public function update(UpdateQuestionnaireRequest $request, QuestionnaireService $service, $id)
    {
        $service->update($id, $request->all());

        return response('', Response::HTTP_NO_CONTENT);
    }

    public function delete(DeleteQuestionnaireRequest $request, QuestionnaireService $service, $id)
    {
        $service->delete($id);

        return response('', Response::HTTP_NO_CONTENT);
    }

    public function search(SearchQuestionnaireRequest $request, QuestionnaireService $service)
    {
        $result = $service->search($request->all());

        return response($result);
    }
}