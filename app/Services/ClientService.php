<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 24/12/20
 * Time: 20:24
 */

namespace App\Services;


use App\Http\Requests\ClientRequest;
use App\Repositories\ClientRepository;

class ClientService
{
    /** @var ClientRepository  */

    protected $repository;
    /**
     * @var ClientRequest
     */
    private $request;

    public function __construct(ClientRepository $repository, ClientRequest $request)
    {
        $this->repository = $repository;
        $this->request = $request;
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