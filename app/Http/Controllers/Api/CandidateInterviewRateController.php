<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Repositories\CandidateInterviewRate\CandidateInterviewRateRepoInterface;
use App\Traits\ApiResponser;
use Exception;
use Illuminate\Http\Request;

class CandidateInterviewRateController extends Controller
{

    use ApiResponser;

    private CandidateInterviewRateRepoInterface $candidateInterviewRateRepo;

    public function __construct(CandidateInterviewRateRepoInterface $candidateInterviewRateRepo)
    {
        $this->candidateInterviewRateRepo = $candidateInterviewRateRepo;

        $this->middleware('permission:candidateInterviewRateShow',['only'=>['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            // $result = Assessment::with('interviewStage', 'interviewer', 'assessmentResult.topic', 'assessmentResult.rate')->where('interview_stage_id', $id)->get();
            $data = $this->candidateInterviewRateRepo->show($id);
            return $this->success(200, $data, 'success');
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
