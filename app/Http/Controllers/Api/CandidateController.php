<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Candidate;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CandidateRequest;
use App\Http\Resources\CandidateResource;
use App\Services\Candidate\CandidateServiceInterface;
use App\Repositories\Candidate\CandidateRepoInterface;



class CandidateController extends Controller
{

    use ApiResponser;
    private CandidateRepoInterface $candidateRepo;
    private CandidateServiceInterface $candidateService;

    public function __construct(CandidateRepoInterface $candidateRepo, CandidateServiceInterface $candidateService)
    {
        $this->candidateRepo = $candidateRepo;
        $this->candidateService = $candidateService;

        $this->middleware('permission:candidateList',['only'=>['index']]);
        $this->middleware('permission:candidateCreate',['only'=>['store']]);
        $this->middleware('permission:candidateUpdate',['only'=>['update']]);
        $this->middleware('permission:candidateDelete',['only'=>['destroy']]);
        $this->middleware('permission:candidateShow',['only'=>['show']]);
    }
   
    public function index()
    {
        try {
            $data = $this->candidateRepo->get();
            return $this->success(200, CandidateResource::collection($data), 'success');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }

  
    public function store(Request $request)
    {
        try {
            $data = $this->candidateService->store($request);
            return $this->success(200, "success", "New Candidate Created");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }

  
    public function show($id)
    {

        try {
            $result = $this->candidateRepo->show($id);
            return $this->success(200, new CandidateResource($result), 'success');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }

   
    public function update(Request $request, $id)
    {
        try {

            $data = $this->candidateService->update($request->all(), $id);
            return $this->success(200, $data, 'success');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }

   
    public function destroy($id)
    {
        try {
            $result = Candidate::where('id', $id)->first();
            $result->delete();
            return $this->success(200, $result, 'success');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }
}
