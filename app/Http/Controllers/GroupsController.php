<?php

namespace App\Http\Controllers;

use App\Http\Requests\Groups\CreateGroupsRequest;
use App\Http\Requests\Groups\GetGroupsRequest;
use App\Http\Requests\Groups\UpdateGroupsRequest;
use App\Http\Requests\Groups\DeleteGroupsRequest;
use App\Http\Requests\Groups\SearchGroupsRequest;
use App\Services\GroupsService;
use Symfony\Component\HttpFoundation\Response;

class GroupsController extends Controller
{
    public function create(CreateGroupsRequest $request, GroupsService $service)
    {
        $data = $request->all();

        $result = $service->create($data);

        return response()->json($result);
    }

    public function get(GetGroupsRequest $request, GroupsService $service, $id)
    {
        $result = $service
            ->withRelations($request->input('with', []))
            ->find($id);

        return response()->json($result);
    }

    public function update(UpdateGroupsRequest $request, GroupsService $service, $id)
    {
        $service->update($id, $request->all());

        return response('', Response::HTTP_NO_CONTENT);
    }

    public function delete(DeleteGroupsRequest $request, GroupsService $service, $id)
    {
        $service->delete($id);

        return response('', Response::HTTP_NO_CONTENT);
    }

    public function search(SearchGroupsRequest $request, GroupsService $service)
    {
        $result = $service->search($request->all());

        return response($result);
    }
}