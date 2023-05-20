<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Traits\ApiResponser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\InterviewAssignRequest;
use App\Http\Requests\InterviewResultRequest;
use App\Http\Resources\InterviewAssignResource;
use App\Models\Interview;
use App\Services\InterviewAssign\InterviewAssignServiceInterface;
use App\Repositories\InterviewAssign\InterviewAssignRepoInterface;

class InterviewAssignController extends Controller
{
    use ApiResponser;
    private InterviewAssignRepoInterface $interviewAssignRepo;
    private InterviewAssignServiceInterface $interviewAssignService;

    public function __construct(InterviewAssignRepoInterface $interviewAssignRepo, InterviewAssignServiceInterface $interviewAssignService)
    {
        $this->interviewAssignRepo = $interviewAssignRepo;
        $this->interviewAssignService = $interviewAssignService;

        $this->middleware('permission:interviewAssignCreate',['only'=>['store']]);
        $this->middleware('permission:interviewAssignUpdate',['only'=>['update']]);
    
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
            $this->interviewAssignService->store($request);

            return $this->success(200, "success", "New InterviewAssign Created");
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
    public function update(InterviewResultRequest  $request, $id)
    {
        try {
            $data = $this->interviewAssignService->update($request->validated(), $id);
            return $this->success(200, $data, "Updated Success Interviews result");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
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
