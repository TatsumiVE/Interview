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
    public function interviewAssessment($candidateId, $interveiwerId)
    {
        try {
            $data = $this->interviewAssessmentRepo->show($candidateId, $interveiwerId);
            return $this->success(200, $data, 'success');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }
}
