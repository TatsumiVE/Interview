<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\InterviewAssessment\InterviewAssessmentRepoInterface;

class InterviewAssessmentController extends Controller
{

    use ApiResponser;
    private InterviewAssessmentRepoInterface $interviewAssessmentRepo;



    public function __construct(InterviewAssessmentRepoInterface $interviewAssessmentRepo)
    {
        $this->interviewAssessmentRepo = $interviewAssessmentRepo;
    }

    //step 1 to get InterviewAssginID
    public function interviewAssign($candidateId, $interveiwerId)
    {
        try {
            $data = $this->interviewAssessmentRepo->showAssign($candidateId, $interveiwerId);
            return $this->success(200, $data, 'success');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }



    public function interviewAssessment($interviewAssignId)
    {
        try {
            $data = $this->interviewAssessmentRepo-> showAssessment($interviewAssignId);
            return $this->success(200, $data, 'success ');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }
}
