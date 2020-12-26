<?php

namespace App\Http\Controllers;


use App\Repositories\ClientRepository;
use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /** @var ClientRepository  */

    private $repository;
    /**
     * @var ClientService
     */
    private $service;

    public function __construct(ClientRepository $repository, ClientService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        $clients = $this->repository->all();

        return $clients;
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
