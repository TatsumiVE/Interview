<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgencyRequest;
use App\Http\Resources\AgencyResource;
use App\Repositories\Agency\AgencyRepoInterface;
use App\Services\Agency\AgencyServiceInterface;
use App\Traits\ApiResponser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AgencyController extends Controller
{

    use ApiResponser;
    private AgencyRepoInterface $agencyRepo;
    private AgencyServiceInterface $agencyService;

    public function __construct(AgencyRepoInterface $agencyRepo, AgencyServiceInterface $agencyService)
    {
        $this->agencyRepo = $agencyRepo;
        $this->agencyService = $agencyService;

        // $this->middleware('permission:agencyList',['only'=>['index']]);
        // $this->middleware('permission:agencyCreate',['only'=>['store']]);
        // $this->middleware('permission:agencyUpdate',['only'=>['update']]);
        // $this->middleware('permission:agencyDelete',['only'=>['destroy']]);
        // $this->middleware('permission:agencyShow',['only'=>['show']]);
    }

    public function index()
    {
        try {
            $data = $this->agencyRepo->get();
            return $this->success(200, AgencyResource::collection($data), 'success');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');

            // return Redirect::back()->withErrors($e->getMessage());
        };
    }


    public function store(AgencyRequest $request)
    {
        try {

            $data = $this->agencyService->store($request->validated());
            return $this->success(200, new AgencyResource($data), "New Agency Created");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }


    public function show($id)
    {
        try {
            $result = $this->agencyRepo->show($id);
            return $this->success(200, new AgencyResource($result), 'success');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }


    public function update(AgencyRequest $request, $id)
    {
        try {

            $data = $this->agencyService->update($request->validated(), $id);
            return $this->success(200, $data, 'success');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }


    public function destroy($id)
    {
        try {
            $result = $this->agencyService->destroy($id);
            return $this->success(200, $result, 'success');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }
}
