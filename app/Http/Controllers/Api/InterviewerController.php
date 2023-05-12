<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InterviewerRequest;
use App\Repositories\Interviewer\InterviewerRepoInterface;
use App\Services\Interviewer\InterviewerServiceInterface;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class InterviewerController extends Controller
{

    private $InterviewerRepo, $InterviewerService;

    public function __construct(InterviewerRepoInterface $InterviewerRepo, InterviewerServiceInterface $InterviewerService)
    {
        $this->InterviewerRepo = $InterviewerRepo;
        $this->InterviewerService = $InterviewerService;
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        try {
            $data = $this->InterviewerRepo->get();


            return response()->json([
                'status' => 'success',
                'message' => 'InterviwerList',
                'data' => $data
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
                'data' => $data
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InterviewerRequest $request)
    {
        try {
            $data = $this->InterviewerService->store($request->validated());
            return response()->json([
                'status' => 'success',
                'message' => 'Interviewer Add list',
                'data' => $data
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
                'data' => $data
            ], 500);
        }
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
    public function update(InterviewerRequest $request, $id)
    {
        try {
            $data = $this->InterviewerService->update($request->validated(), $id);
            return response()->json([
                'status' => 'success',
                'message' => 'Interviewer updated list',
                'data' => $data
            ], 200);
        } catch (\Throwable $th) {

            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
                'data' =>  $data
            ], 500);
        }
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
