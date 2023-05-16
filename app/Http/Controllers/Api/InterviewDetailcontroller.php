<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\InterviewDetail\InterviewDetailRepoInterface;
use App\Traits\ApiResponser;
use Exception;
use Illuminate\Http\Request;

class InterviewDetailcontroller extends Controller
{
    use ApiResponser;
    private InterviewDetailRepoInterface $interviewDetailRepo;

    public function __construct(InterviewDetailRepoInterface $interviewDetailRepo)
    {
        $this->interviewDetailRepo = $interviewDetailRepo;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        try {

            $data = $this->interviewDetailRepo->get();
            return $this->success(200,$data, 'success');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
