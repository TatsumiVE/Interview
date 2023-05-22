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

     public function __construct(InterviewerRepoInterface $interviewerRepo,InterviewerServiceInterface $interviewerService)
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
        try{
            $data=$this->interviewerRepo->get();
            return $this->success(200, InterviewerResource::collection($data));
        } catch(Exception $exception){
        return $this->error($exception->getCode(),[],$exception->getMessage());
        // return $this->customApiResponse($exception);
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
        try{
        $data = $this->interviewerService->store($request->validated());
        return $this->success(200,new InterviewerResource($data),"New Interviewer Created");
       }
       catch(Exception $exception){
        return $this->error($exception->getCode(),[],$exception->getMessage());
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
        try{
            $data = $this->interviewerRepo->show($id);

            return $this->success(200,new InterviewerResource($data));
           }
           catch(Exception $exception){
            return $this->error($exception->getCode(),[],$exception->getMessage());
           }
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
        try{

            $data = $this->interviewerService->update($request->validated(),$id);
            return $this->success(200,$data,"new interviewer update");


        }catch(Exception $exception){
            return $this->error($exception->getCode(),[],$exception->getMessage());
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
