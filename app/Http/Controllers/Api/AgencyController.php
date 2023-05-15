<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgencyRequest;
use App\Http\Resources\AgencyResource;
use App\Repositories\Agency\AgencyRepoInterface;
use App\Services\Agency\AgencyServiceInterface;
use App\Traits\ApiResponser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AgencyController extends Controller
{

    use ApiResponser;
    private AgencyRepoInterface $agencyRepo;
    private AgencyServiceInterface $agencyService;

    public function __construct(AgencyRepoInterface $agencyRepo, AgencyServiceInterface $agencyService)
    {
        $this->agencyRepo = $agencyRepo;
        $this->agencyService = $agencyService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = $this->agencyRepo->get();
            return $this->success(200, AgencyResource::collection($data), 'success');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');

            // return Redirect::back()->withErrors($e->getMessage());
        };
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgencyRequest $request)
    {
        try {

            $data = $this->agencyService->store($request->validated());
            return $this->success(200, new AgencyResource($data), "New Agency Created");
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
        try {
            $result = $this->agencyRepo->show($id);
            return $this->success(200, new AgencyResource($result), 'success');
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
    public function update(AgencyRequest $request, $id)
    {
        try {

            $data = $this->agencyService->update($request->validated(), $id);
            return $this->success(200, $data, 'success');
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
        try {
            $result = $this->agencyRepo->destroy($id);
            return $this->success(200, new AgencyResource($result), 'success');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }
}
