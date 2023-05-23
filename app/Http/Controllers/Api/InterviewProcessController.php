<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\InterviewResultRequest;
use App\Services\InterviewAssign\InterviewAssignServiceInterface;
use App\Repositories\InterviewAssign\InterviewAssignRepoInterface;

class InterviewProcessController extends Controller
{

    use ApiResponser;
        private InterviewAssignRepoInterface $interviewAssignRepo;
        private InterviewAssignServiceInterface $interviewAssignService;

        public function __construct(InterviewAssignRepoInterface $interviewAssignRepo, InterviewAssignServiceInterface $interviewAssignService)
        {
            $this->interviewAssignRepo = $interviewAssignRepo;
            $this->interviewAssignService = $interviewAssignService;

            // $this->middleware('permission:interviewAssignCreate',['only'=>['store']]);
            // $this->middleware('permission:interviewAssignUpdate',['only'=>['update']]);

        }

        public function show($interviewAssignId)
    {
        try {
            $data = $this->interviewAssignRepo->show($interviewAssignId);
            return $this->success(200, $data, 'success ');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }

        public function store(Request $request)
        {
            try {
                $this->interviewAssignService->store($request);

                return $this->success(200, "success", "New InterviewAssign Created");
            } catch (Exception $e) {
                return $this->error(500, $e->getMessage(), 'Internal Server Error');
            };
        }

        public function update(InterviewResultRequest  $request, $id)
        {
            try {
                $data = $this->interviewAssignService->update($request->validated(), $id);
                return $this->success(200, $data, "Updated Success Interviews result");
            } catch (Exception $e) {
                return $this->error(500, $e->getMessage(), 'Internal Server Error');
            };
        }



}
