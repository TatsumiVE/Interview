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
use App\Rules\UniqueIntegerArrayRule;
use App\Rules\InterviewResultDateRule;
use Illuminate\Support\Facades\Validator;

use App\Rules\InterviewTimeRule;
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
            $validator = Validator::make($request->all(), [
                'stage_name' => 'required',
                'interview_date' => ['required',new InterviewResultDateRule],
                'interview_time' => 'required',
                'location' => 'required|integer',
                'candidate_id' => 'required',
                'interviewer_id' => ['required', 'array', new UniqueIntegerArrayRule, 'exists:interviewers,id'],
            ]);
            if ($validator->fails()) {
                $errorResponse = $validator->errors();

                $response = [
                    'status' => 'error',
                    'status_code' => 422,
                    'data' => $errorResponse,
                    'err_msg' => 'Validation Error.',
                ];

                return response()->json($response, 422);
            }

            $response = $this->interviewProcessService->store($request->all());

            // Clear the interviewer_id array from the request
            $request->merge(['interviewer_id' => []]);

            return $this->success(201, $response, "New InterviewAssign Created");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error creating InterviewAssign: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        }
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






    public function interviewSummarize(Request $request,  $candidateID, $stageID)
    {
        try {
            $validator = Validator::make($request->all(), [
                'interview_summarize' => 'required',
                'interview_result_date' => ['required',new InterviewResultDateRule],
                'interview_result' => 'required',
                'record_path' => ['required', 'regex:/^https:\/\/drive\.google\.com\/file\/d\/[a-zA-Z0-9_-]+\/view\?usp=drivesdk$/'],
            ]);
            if ($validator->fails()) {
                $errorResponse = $validator->errors();

                $response = [
                    'status' => 'error',
                    'status_code' => 422,
                    'data' => $errorResponse,
                    'err_msg' => 'Validation Error.',
                ];

                return response()->json($response, 422);
            }

            $data = $this->interviewProcessService->interviewSummarize($request->all(), $candidateID, $stageID);
            return $this->success(200, $data, "Updated Success Interviews result");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error creating InterviewSummarize data: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        }
    }







    public function terminateProcess($candidateId)
    {
        try {

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
