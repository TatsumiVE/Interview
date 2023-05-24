<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\InterviewResultRequest;


use App\Repositories\InterviewProcess\InterviewProcessRepoInterface;
use App\Services\InterviewProcess\InterviewProcessServiceInterface;

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

    // public function showAssessment($showAssessment)
    // {
    //     try {
    //         $data = $this->interviewProcessRepo->showAssessment($showAssessment);
    //         return $this->success(200, $data, 'success ');
    //     } catch (Exception $e) {
    //         return $this->error(500, $e->getMessage(), 'Internal Server Error');
    //     };
    // }

        public function update(InterviewResultRequest  $request, $id)
        {
            try {
                $data = $this->interviewProcessService->update($request->validated(), $id);
                return $this->success(200, $data, "Updated Success Interviews result");
            } catch (Exception $e) {
                return $this->error(500, $e->getMessage(), 'Internal Server Error');
            };
        }
}
