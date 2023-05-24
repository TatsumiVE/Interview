<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use App\Http\Requests\InterviewerRequest;
use App\Http\Resources\InterviewerResource;
use App\Services\Interviewer\InterviewerServiceInterface;
use App\Repositories\Interviewer\InterviewerRepoInterface;

class InterviewerController extends Controller
{
    use ApiResponser;
    private InterviewerRepoInterface $interviewerRepo;
    private InterviewerServiceInterface $interviewerService;

    public function __construct(InterviewerRepoInterface $interviewerRepo, InterviewerServiceInterface $interviewerService)
    {
        $this->interviewerRepo = $interviewerRepo;
        $this->interviewerService = $interviewerService;

        // $this->middleware('permission:interviewerList',['only'=>['index']]);
        // $this->middleware('permission:interviewerCreate',['only'=>['store']]);
        // $this->middleware('permission:interviewerUpdate',['only'=>['update']]);
        // $this->middleware('permission:interviewerDelete',['only'=>['destroy']]);
        // $this->middleware('permission:interviewerShow',['only'=>['show']]);
    }



    public function index()
    {
        try {
            $data = $this->interviewerRepo->get();
            return $this->success(200, InterviewerResource::collection($data), "Interviewer retrieved successfully.");
        } catch (Exception $exception) {
            return $this->error(500, $exception->getMessage(), 'Internal Server Error.');
        }
    }

   
    public function store(InterviewerRequest $request)
    {
        try {
            $data = $this->interviewerService->store($request->validated());
            return $this->success(200, new InterviewerResource($data), "Interviewer Created successfully.");
        } catch (Exception $exception) {
            return $this->error(500, $exception->getMessage(), 'Internal Server Error.');
        }
    }

   
    public function show($id)
    {
        try {
            $data = $this->interviewerRepo->show($id);
            return $this->success(200, new InterviewerResource($data),"Interviewer showed successfully.");
        } catch (Exception $exception) {
            return $this->error(500, $exception->getMessage(), 'Internal Server Error.');
        }
    }

   

    public function update(InterviewerRequest $request, $id)
    {
        try {
            $data = $this->interviewerService->update($request->validated(), $id);
            return $this->success(200, $data, "Interviewer updated successfully.");
        } catch (Exception $exception) {
            return $this->error(500, $exception->getMessage(), 'Internal Server Error.');
        }
    }

    public function destroy($id)
    {
        try {
            $data = $this->interviewerService->delete($id);
            return $this->success(200, $data, "Interviewer deleted successfully.");
        } catch (Exception $exception) {
            return $this->error(500, $exception->getMessage(), 'Internal Server Error.');
        }
    }
}
