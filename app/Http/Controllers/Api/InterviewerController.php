<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Interviewer;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\InterviewerRequest;
use App\Http\Resources\InterviewerResource;

use App\Services\Interviewer\InterviewerServiceInterface;
use App\Repositories\Interviewer\InterviewerRepoInterface;
use Illuminate\Support\Facades\Validator;

class InterviewerController extends Controller
{
    use ApiResponser;
    private InterviewerRepoInterface $interviewerRepo;
    private InterviewerServiceInterface $interviewerService;

    public function __construct(InterviewerRepoInterface $interviewerRepo, InterviewerServiceInterface $interviewerService)
    {
        $this->interviewerRepo = $interviewerRepo;
        $this->interviewerService = $interviewerService;

        $this->middleware('permission:interviewerList', ['only' => ['index']]);
        $this->middleware('permission:interviewerCreate', ['only' => ['store']]);
        $this->middleware('permission:interviewerUpdate', ['only' => ['update']]);
        $this->middleware('permission:interviewerDelete', ['only' => ['destroy']]);
        $this->middleware('permission:interviewerShow', ['only' => ['show']]);
    }



    public function index()
    {
        try {

            $data = $this->interviewerRepo->get();
            return $this->success(200, InterviewerResource::collection($data), "Interviewer retrieved successfully.");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error retrieving Interviewer data: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }


    public function store(InterviewerRequest $request)
    {
        try {
            $data = $this->interviewerService->store($request->validated());
            return $this->success(200, new InterviewerResource($data), "Interviewer Created successfully.");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error creating Interviewer: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }


    public function show($id)
    {
        try {
            $data = $this->interviewerRepo->show($id);
            return $this->success(200, $data, "Interviewer show successfully.");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error retrieving Interviewer data: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }



    // public function update(Request $request, $id)
    // {
    //     try {
    //         $validateData = $request->validate([
    //             'name' => 'required',
    //             'email' => 'required|email|unique:interviewers,email,' . $id,
    //             'position_id' => 'required|exists:positions,id',
    //             'department_id' => 'required|exists:departments,id',
    //         ]);


    //         $data = $this->interviewerService->update($validateData, $id);
    //         return $this->success(200, $data, "Interviewer updated successfully.");
    //     } catch (Exception $e) {

    //         return $this->error(500, $e->getMessage(), 'Internal Server Error.');
    //     }
    // }

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:interviewers,email,' . $id,
                'department_id' => 'required|exists:departments,id',
                'position_id' => 'required|exists:positions,id',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                return $this->error(422, $errors, 'Validation Error.');
            }

            $data = $this->interviewerService->update($request->all(), $id);
            return $this->success(200, $data, "Interviewer updated successfully.");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }



    public function destroy(Interviewer $interviewer)
    {
        try {
            if (count($interviewer->interviewAssgins) == 0) {
                $interviewer->delete();
                $data = '';
                return $this->success(200, $data, "Interviewer deleted successfully.");
            } else {
                $msg = 'Sorry,cannot delete because there are some relationships remaining';
                return $this->error(500, $msg, 'Internal Server Error');
            }
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error deleting Interviewer: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        }
    }
}
