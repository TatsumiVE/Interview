<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Candidate;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\InterviewResultRequest;
use App\Services\InterviewProcess\InterviewProcessServiceInterface;
use App\Repositories\InterviewProcess\InterviewProcessRepoInterface;

class InterviewProcessController extends Controller
{

    use ApiResponser;
        private InterviewProcessRepoInterface $interviewProcessRepo;
        private InterviewProcessServiceInterface $interviewProcessService;

        public function __construct(InterviewProcessRepoInterface $interviewProcessRepo,
        InterviewProcessServiceInterface $interviewProcessService)
        {
            $this->interviewProcessRepo= $interviewProcessRepo;
            $this->interviewProcessService = $interviewProcessService;

            $this->middleware('permission:interviewProcessCreate',['only'=>['store']]);
            $this->middleware('permission:interviewProcessSearchAssignId',['only'=>['searchInterviewAssignId']]);
            $this->middleware('permission:interviewProcessUpdate', ['only' => ['interviewSummerize']]);
            $this->middleware('permission:interviewProcessTerminate', ['only' => ['terminateProcess']]);
        }
        public function store(Request $request)
        {
            try {
                $this->interviewProcessService->store($request);

                return $this->success(200, "success", "New InterviewAssign Created");
            } catch (Exception $e) {
                return $this->error(500, $e->getMessage(), 'Internal Server Error');
            };
        }

        public function searchInterviewAssignId($candidateId, $interviewerId)
    {
        try {
            $data = $this->interviewProcessRepo->showAssign($candidateId,$interviewerId);
            return $this->success(200, $data, 'success ');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }

    public function interviewSummarize(InterviewResultRequest  $request,  $candidateId, $stageId)
    {
        try {
            $data = $this->interviewProcessService->interviewSummarize($request->all(), $candidateId, $stageId);
            return $this->success(200, $data, "Updated Success Interviews result");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }


    public function terminateProcess($candidateId)
    {
        try {

            $candidate = Candidate::findOrFail($candidateId);
            $candidate->status = 1;
            $data = $candidate->save();
            return $this->success(200, $data, "Candidate Terminate Successfully");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }


}
