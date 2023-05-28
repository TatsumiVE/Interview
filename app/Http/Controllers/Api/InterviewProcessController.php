<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Candidate;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\InterviewResultRequest;
use App\Models\Interview;
use App\Services\InterviewProcess\InterviewProcessServiceInterface;
use App\Repositories\InterviewProcess\InterviewProcessRepoInterface;

class InterviewProcessController extends Controller
{

    use ApiResponser;
    private InterviewProcessRepoInterface $interviewProcessRepo;
    private InterviewProcessServiceInterface $interviewProcessService;

    public function __construct(
        InterviewProcessRepoInterface $interviewProcessRepo,
        InterviewProcessServiceInterface $interviewProcessService
    ) {
        $this->interviewProcessRepo = $interviewProcessRepo;
        $this->interviewProcessService = $interviewProcessService;

        // $this->middleware('permission:interviewProcessCreate', ['only' => ['store']]);
        // $this->middleware('permission:interviewProcessSearchAssignId', ['only' => ['searchInterviewAssignId']]);
        // $this->middleware('permission:interviewProcessUpdate', ['only' => ['update']]);
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
            $data = $this->interviewProcessRepo->showAssign($candidateId, $interviewerId);
            return $this->success(200, $data, 'success ');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }

    // public function showAssessment($showAssessment)
    // {
    //     try {
    //         $data = $this->interviewProcessRepo->showAssessment($showAssessment);
    //         return $this->success(200, $data, 'success ');
    //     } catch (Exception $e) {
    //         return $this->error(500, $e->getMessage(), 'Internal Server Error');
    //     };


    // }


    //interview summerize 
    public function interviewSummerize(InterviewResultRequest  $request,  $candidateID, $stageID)
    {
        try {
            $data = $this->interviewProcessService->interviewSummerize($request->validated(), $candidateID, $stageID);
            return $this->success(200, $data, "Updated Success Interviews result");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }


    // public function checkInterviewStage(Interview  $interview)
    // {
    //     $candidate = $interview->candidate;
    //     $interviewStageId = $interview->interview_stage_id;

    //     if ($interviewStageId == 1) {
    //         $msg = 'Candidate is in stage 1';
    //         return $this->success(200, [], $msg);
    //     } elseif ($interviewStageId == 2) {
    //         $msg = 'Candidate is in stage 2';
    //         return $this->success(200, [], $msg);
    //     }
    //     $msg = 'Invalid interview or candidate not found';
    //     return $this->error(500, $msg, 'Internal Server Error');
    // }




    public function terminateProcess($candidateId)
    {
        try {
            // $data =  DB::table('candidates')->where('id', $id)->update([
            //     'status' => 1
            // ]);
            $candidate = Candidate::findOrFail($candidateId);
            $candidate->status = 1;
            $data = $candidate->save();
            return $this->success(200, $data, "Candidate Terminate Successfully");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }
}
