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
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $data = $this->candidateRepo->get();
            return $this->success(200, CandidateResource::collection($data), 'success');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {


            $data = $this->candidateService->store($request);
            return $this->success(200, new CandidateResource($data), "New Candidate Created");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        try {
            $result = $this->candidateRepo->show($id);
            return $this->success(200, new CandidateResource($result), 'success');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CandidateRequest $request, $id)
    {
        try {

            $data = $this->candidateService->update($request->validated(), $id);
            return $this->success(200, $data, 'success');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
