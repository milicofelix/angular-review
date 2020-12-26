<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 24/12/20
 * Time: 20:24
 */

namespace App\Services;


use App\Http\Requests\ProjectNoteRequest;
use App\Repositories\ProjectNoteRepository;
use App\Repositories\ProjectRepository;

class ProjectNoteService
{


    /**
     * @var ProjectNoteRequest
     */
    private $request;
    /**
     * @var ProjectNoteRepository
     */
    private $repository;


    public function __construct(ProjectNoteRepository $repository, ProjectNoteRequest $request)
    {

        $this->request = $request;
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        try{
            $this->request->all($data);
            return $this->repository->create($data);
        }catch (\HttpRequestException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ],204);
        }

    }

    public function update(array $data, $id)
    {
        try{
            $this->request->all($data);
            return $this->repository->update($data, $id);
        }catch (\HttpRequestException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ],204);
        }
    }

}