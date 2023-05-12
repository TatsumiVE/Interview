<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;
use Illuminate\Http\Request;
use App\Http\Resources\TopicResource;
use App\Repositories\Topic\TopicRepoInterface;
use App\Services\Topic\TopicServiceInterface;



class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use ApiResponser;
    private TopicRepoInterface $topicRepo;
    private TopicServiceInterface $topicService;


    public function __construct(TopicRepoInterface $topicRepo,TopicServiceInterface $topicService)
    {
        $this->topicRepo = $topicRepo;
        $this->topicService = $topicService;

    }
    public function index()
    {
        $data=$this->topicRepo->get();
        return $this->success(200, TopicResource::collection($data));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TopicRequest $request)
    {
        $data = $this->topicService->store($request->validated());
        return $this->success(200, new TopicResource($data));
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
    public function update(TopicRequest $request, $id)
    {
        $data = $this->topicService->update($request->validated(),$id);
        return $this->success(200, new TopicResource($data));

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
