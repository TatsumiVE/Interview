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

        // $this->middleware('permission:candidateList',['only'=>['index']]);
        // $this->middleware('permission:candidateagencyCreate',['only'=>['store']]);
        // $this->middleware('permission:candidateUpdate',['only'=>['update']]);
        // $this->middleware('permission:candidateDelete',['only'=>['destroy']]);
        // $this->middleware('permission:candidateShow',['only'=>['show']]);
    }

    public function index()
    {
        try {
            $data = $this->candidateRepo->get();

            return $this->success(200, $data, 'Candidate Data retrieved successfully');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }


    public function store(Request $request)
    {
        try {
            $data = $this->candidateService->store($request);
            return $this->success(200, "success", "New Candidate Created Successfully");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }


    public function show($id)
    {

        try {
            $data = $this->candidateRepo->show($id);
            return $this->success(200, $data, 'Candidate Data retrieved  successfully');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }


    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:candidates,email' . $id,
                'gender' => 'required',
                'phone_number' => 'required',
                'residential_address' => 'required',
                'date_of_birth'  => 'required | date ',
                'cv_path'  => 'required',
                'willingness_to_travel' => '',
                'expected_salary' => '',
                'last_salary' => '',
                'earliest_starting_date' => '',
                'position_id' => 'required|exists:positions,id',
                'agency_id' => 'required| exists:agencies,id',
                'status' => '',
                'data.*.experience.month' => 'required|integer|between:1,12',
                'data.*.experience.year' => 'required|integer|between:0,30',
                'data.*.devlanguage_id' => 'required',
            ]);

            $data = $this->candidateService->update($validatedData, $id);
            return $this->success(200, $data, 'Candidate updated successfully');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }


    public function destroy(Candidate $candidate)
    {
        if (count($candidate->specificLanguages) == 0 || count($candidate->assessments) == 0 || count($candidate->interviews) == 0) {
            $candidate->delete();
            $data = '';
            return $this->success(200, $data, 'Candidate deleted successfully');
        } else {
            $msg = 'Cannot delete because there is are relationships remaining';
            return $this->error(500, $msg, 'Internal Server Error');
        }
    }
}
