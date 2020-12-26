<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 24/12/20
 * Time: 20:24
 */

namespace App\Services;


use App\Http\Requests\ProjectRequest;
use App\Repositories\ProjectRepository;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Filesystem\Filesystem;

class ProjectService
{
    /** @var ClientRepository  */

    protected $repository;
    /**
     * @var ClientRequest
     */
    private $request;
    /**
     * @var Filesystem
     */
    private $filesystem;
    /**
     * @var Storage
     */
    private $storage;

    public function __construct(ProjectRepository $repository, ProjectRequest $request, Filesystem $filesystem, Storage $storage)
    {
        $this->repository = $repository;
        $this->request = $request;
        $this->filesystem = $filesystem;
        $this->storage = $storage;
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

    public function createProjectFile(array $data)
    {
        $project = $this->repository->find($data['project_id']);
        //dd($project);
        $projectFile = $project->files()->create($data);
        $this->storage->put($projectFile->id.".".$data['extension'], $this->filesystem->get($data['file']));
    }

}