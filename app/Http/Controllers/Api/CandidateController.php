<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Candidate;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\InterviewStage;
use Illuminate\Support\Facades\Log;
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
        $this->middleware('permission:candidateList', ['only' => ['index']]);
        $this->middleware('permission:candidateCreate', ['only' => ['store']]);
        $this->middleware('permission:candidateUpdate', ['only' => ['update']]);
        $this->middleware('permission:candidateDelete', ['only' => ['destroy']]);
        $this->middleware('permission:candidateShow', ['only' => ['show']]);
    }

    public function index()
    {
        try {
            $data = $this->candidateRepo->get();

            return $this->success(200, $data, 'Candidate Data retrieved successfully');
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error retrieving candidate data: ' . $e->getMessage());

            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }


    public function store(Request $request)
    {
        try {
            $data = $this->candidateService->store($request);
            return $this->success(201, "success", "New Candidate Created Successfully");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error creating candidate: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }


    public function show(Candidate $candidate)
    {

        try {
            $data = $this->candidateRepo->show($candidate);
            return $this->success(200, $data, 'Candidate Data retrieved  successfully');
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error retrieving candidate data: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }


    public function update(Request $request, $id)
    {
        try {
            $data = $this->candidateService->update($request, $id);
            return $this->success(200, $data, 'Candidate updated successfully');
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error updating candidate: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }


    public function destroy(Candidate $candidate)
    {
        try {
            if (count($candidate->specificLanguages) == 0 || count($candidate->assessments) == 0 || count($candidate->interviews) == 0) {
                $candidate->delete();
                $data = '';
                return $this->success(200, $data, 'Candidate deleted successfully');
            } else {
                $msg = 'Sorry, cannot delete because there are some relationships remaining';
                return $this->error(500, $msg, 'Internal Server Error');
            }
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error deleting candidate: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        }
    }
}
