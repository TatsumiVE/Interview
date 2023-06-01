<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Candidate;
use App\Models\Interview;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\InterviewResultRequest;
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
        $this->middleware('permission:interviewProcessCreate', ['only' => ['store']]);
        $this->middleware('permission:interviewProcessSearchAssignId', ['only' => ['searchInterviewAssignId']]);
        $this->middleware('permission:interviewSummarize', ['only' => ['interviewSummarize']]);
        $this->middleware('permission:interviewProcessTerminate', ['only' => ['terminateProcess']]);
    }
    public function store(Request $request)
    {
        try {
            $response = $this->interviewProcessService->store($request);
            // dd($response);
            return $this->success(201, $response, "New InterviewAssign Created");
        } catch (Exception $e) {

            Log::channel('web_daily_error')->error('Error creating InterviewAssign: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }

    public function searchInterviewAssignId($candidateId, $interviewerId)
    {
        try {
            $data = $this->interviewProcessRepo->showAssign($candidateId, $interviewerId);
            return $this->success(200, $data, 'success ');
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error retrieving InterviewAssignID : ' . $e->getMessage());
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


    //interview summarize 
    public function interviewSummarize(InterviewResultRequest  $request,  $candidateID, $stageID)
    {
        try {
            $data = $this->interviewProcessService->interviewSummarize($request->validated(), $candidateID, $stageID);
            return $this->success(200, $data, "Updated Success Interviews result");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error creating InterviewSummerize data: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }







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
            Log::channel('web_daily_error')->error('Error terminate Candidate data: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }
}
