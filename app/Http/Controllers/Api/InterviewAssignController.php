<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Traits\ApiResponser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\InterviewAssignResource;
use App\Repositories\InterviewAssign\InterviewAssignRepoInterface;
use App\Services\InterviewAssign\InterviewAssignServiceInterface;

class InterviewAssignController extends Controller
{
    use ApiResponser;
    private InterviewAssignRepoInterface $interviewAssignRepo;
    private InterviewAssignServiceInterface $interviewAssignService;

    public function __construct(InterviewAssignRepoInterface $interviewAssignRepo, InterviewAssignServiceInterface $interviewAssignService)
    {
        $this->interviewAssignRepo = $interviewAssignRepo;
        $this->interviewAssignService = $interviewAssignService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
            //     $validatedData = $request->validate([
            //         'stage_name' => 'required',
            //         'interview_date' => 'required',
            //         'interview_time' => 'required',
            //         'location' => '',
            //         'record_path' => '',
            //         'record_path' => '',
            //         'interview_result' => '',
            //         'interview_summarize' => '',
            //         'interview_result_date' => '',
            //         'candidate_id' => 'required',
            //         'interview_stages_id' => 'required',
            //         'name' => 'required',
            //         'position_id' => 'required',

            //     ]);


            $data = $this->interviewAssignService->store($request);
            return $this->success(200, "done", "New Candidate Created");
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
