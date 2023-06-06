<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Interviewer;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\InterviewResource;
use App\Services\Interview\InterviewServiceInterface;
use App\Repositories\Interview\InterviewRepoInterface;
use Illuminate\Support\Facades\Validator;
// use App\Rules\UniqueIntegerArrayRule;

class InterviewController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use ApiResponser;
    private InterviewRepoInterface $interviewRepo;
    private InterviewServiceInterface $interviewService;

    public function __construct(InterviewRepoInterface $interviewRepo, InterviewServiceInterface $interviewerService)
    {
        $this->interviewRepo = $interviewRepo;
        $this->interviewService = $interviewerService;

        $this->middleware('permission:interviewList', ['only' => ['index']]);
        $this->middleware('permission:remarkAssessmentCreate', ['only' => ['store']]);
    }
    public function index()
    {
        try {
            $data = $this->interviewRepo->get();
            return $this->success(200, $data, 'success');
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error retrieving Interview-Candidate data: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        //assessment create
        try {

            $validator = Validator::make($request->all(), [
                'interview_stage_id' => 'required|exists:interview_stages,id',
                'comment' => 'required|string',
                'grade' => 'required|integer',
                'interview_assign_id' => 'required|exists:interview_assigns,id',
                'candidate_id' => 'required|exists:candidates,id',
                'data' => 'required | array',
                // 'data' => ['required', 'array', new UniqueIntegerArrayRule],
                'data.*.topic_id' => 'required|exists:topics,id',
                'data.*.rate_id' => 'required|exists:rates,id',
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
            $response =  $this->interviewService->store($request->all());

            return $this->success(201,   $response, "New Interview-Candidate Assessment  Created");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error creating Interview-Candidate Assessment: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        }
    }
}
