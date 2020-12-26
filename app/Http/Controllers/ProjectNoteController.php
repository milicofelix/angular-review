<?php

namespace App\Http\Controllers;

use App\Repositories\ProjectNoteRepository;
use App\Services\ProjectNoteService;
use Illuminate\Http\Request;

class ProjectNoteController extends Controller
{

    /**
     * @var ProjectNoteRepository
     */
    private $repository;
    /**
     * @var ProjectNoteService
     */
    private $service;

    public function __construct(ProjectNoteRepository $repository, ProjectNoteService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index($id)
    {
        return $this->repository->findWhere(['project_id' => $id]);
    }

    public function show($id, $note_id)
    {
        return $this->repository->findWhere(['project_id' => $id, 'id' => $note_id]);
    }

    public function store(Request $request)
    {
        $this->service->create($request->all());

        return response()->json([],200);
    }

    public function update(Request $request, $note_id)
    {
        $this->service->update($request->all(), $note_id);

        return response()->json([],200);

    }

    public function destroy($note_id)
    {
        $this->repository->find($note_id)->delete();
        return response()->json([],200);
    }
}
