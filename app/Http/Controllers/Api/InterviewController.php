<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\InterviewResource;
use App\Services\Interview\InterviewServiceInterface;
use App\Repositories\Interview\InterviewRepoInterface;

class InterviewController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use ApiResponser;
    private InterviewRepoInterface $interviewRepo;
    private InterviewServiceInterface $interviewService;

    public function __construct(InterviewRepoInterface $interviewRepo, InterviewServiceInterface $interviewerService)
    {
        $this->interviewRepo = $interviewRepo;
        $this->interviewService = $interviewerService;

        $this->middleware('permission:interviewList', ['only' => ['index']]);
        $this->middleware('permission:interviewCreate', ['only' => ['store']]);
        $this->middleware('permission:interviewShow', ['only' => ['show']]);
    }
    public function index()
    {
        try {
            $data = $this->interviewRepo->get();
            return $this->success(200, $data, 'success');
        } catch (Exception $e) {

            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        }
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
            $this->interviewService->store($request);
            return $this->success(200, 'Done', "New Assement Form Created");
        } catch (Exception $e) {

            return $this->error(500, $e->getMessage(), 'Internal Server Error');
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
            $data = $this->interviewRepo->show($id);
            return $this->success(200, $data, 'success');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
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
        //
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
