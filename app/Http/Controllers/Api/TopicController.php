<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;
use Illuminate\Http\Request;
use App\Http\Resources\TopicResource;
use App\Models\Topic;
use App\Repositories\Topic\TopicRepoInterface;
use App\Services\Topic\TopicServiceInterface;
use Exception;

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


    public function __construct(TopicRepoInterface $topicRepo, TopicServiceInterface $topicService)
    {
        $this->topicRepo = $topicRepo;
        $this->topicService = $topicService;

        $this->middleware('permission:topicList',['only'=>['index']]);
        $this->middleware('permission:topicCreate',['only'=>['store']]);
        $this->middleware('permission:topicUpdate',['only'=>['update']]);
        $this->middleware('permission:topicDelete',['only'=>['destroy']]);
        $this->middleware('permission:topicShow',['only'=>['show']]);

    }
    public function index()
    {


        try {
            $data = $this->topicRepo->get();
            return $this->success(200, TopicResource::collection($data));
        } catch (Exception $e) {
            return $this->error($e->getCode(), [], $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TopicRequest $request)
    {


        try {
            $data = $this->topicService->store($request->validated());
            return $this->success(200, new TopicResource($data));
        } catch (Exception $e) {
            return $this->error($e->getCode(), [], $e->getMessage());
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


        try {
            $data = $this->topicRepo->show($id);
            return $this->success(200, new TopicResource($data));
        } catch (Exception $e) {
            return $this->error($e->getCode(), [], $e->getMessage());
        }
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

        try {
            $data = $this->topicService->update($request->validated(), $id);
            return $this->success(200, $data, "Topic updated");
        } catch (Exception $e) {
            return $this->error($e->getCode(), [], $e->getMessage());
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


        try {
            $data = Topic::where('id', $id)->first();
            $data->delete();
            return $this->success(200, $data, "Delete topic success");
        } catch (Exception $e) {
            return $this->error($e->getCode(), [], $e->getMessage());
        }
    }
}
