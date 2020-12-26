<?php

namespace App\Http\Controllers;

use App\Repositories\ProjectRepository;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $repository;
    /**
     * @var ProjectService
     */
    private $service;

    public function __construct(ProjectRepository $repository, ProjectService $service)
    {

        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        $projects = $this->repository->all();

        return $projects;
    }

    public function store(Request $request)
    {
        $this->service->create($request->all());

        return response()->json([],200);
    }

    public function show($id)
    {
        if($this->repository->find($id)){
            return $this->repository->find($id);
        }else{
            return response()->json(['message' => 'Nenhum registro encontrado!'],404);
        }
    }

    public function destroy($id)
    {
        $this->repository->find($id)->delete();
        return response()->json([],200);
    }

    public function update(Request $request, $id)
    {
        $this->service->update($request->all(), $id);

        return response()->json([],200);

    }
}
