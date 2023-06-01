<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Topic;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Requests\TopicRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\TopicResource;
use App\Services\Topic\TopicServiceInterface;
use App\Repositories\Topic\TopicRepoInterface;

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

        $this->middleware('permission:topicList', ['only' => ['index']]);
        $this->middleware('permission:topicCreate', ['only' => ['store']]);
        $this->middleware('permission:topicUpdate', ['only' => ['update']]);
        $this->middleware('permission:topicDelete', ['only' => ['destroy']]);
        $this->middleware('permission:topicShow', ['only' => ['show']]);
    }
    public function index()
    {


        try {
            $data = $this->topicRepo->get();
            return $this->success(200, TopicResource::collection($data), "Topic retrieved successfully");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error retrieving Topic data: ' . $e->getMessage());
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
            return $this->success(201, new TopicResource($data), "New Topic Created Successfully");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error creating Topic: ' . $e->getMessage());
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
            return $this->success(200, new TopicResource($data), "Success to Show Topic");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error retrieving Topic data: ' . $e->getMessage());
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
    public function update(Request $request, $id)
    {

        try {
            $validateData = $request->validate([
                'name'  => 'required|string|unique:topics,name,' . $id,
            ]);
            $data = $this->topicService->update($validateData, $id);
            return $this->success(200, $data, "Topic updated successfully");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error updating topic: ' . $e->getMessage());
            return $this->error($e->getCode(), [], $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        try {
            if (count($topic->assessmentResults) == 0) {
                $topic->delete();
                $data = '';
                return $this->success(200, $data, "Topic deleted successfully.");
            } else {
                $msg = 'Sorry,cannot delete because there are some relationships remaining';
                return $this->error(500, $msg, 'Internal Server Error');
            }
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error deleting Topic: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        }
    }
}
