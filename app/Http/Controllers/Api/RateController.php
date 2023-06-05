<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Rate;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Requests\RateRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\RateResource;
use App\Services\Rate\RateServiceInterface;
use App\Repositories\Rate\RateRepoInterface;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use ApiResponser;
    private RateRepoInterface $rateRepo;
    private RateServiceInterface $rateService;


    public function __construct(RateRepoInterface $rateRepo, RateServiceInterface $rateService)
    {
        $this->rateRepo = $rateRepo;
        $this->rateService = $rateService;
        $this->middleware('permission:rateList', ['only' => ['index']]);
        $this->middleware('permission:rateView', ['only' => ['index']]);

        $this->middleware('permission:rateCreate', ['only' => ['store']]);
        $this->middleware('permission:rateUpdate', ['only' => ['update']]);
        $this->middleware('permission:rateDelete', ['only' => ['destroy']]);
        $this->middleware('permission:rateShow', ['only' => ['show']]);
    }
    public function index()
    {


        try {
            $data = $this->rateRepo->get();

            return $this->success(200, RateResource::collection($data), "Rate Retrieved Successfully");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error retrieving Rate data: ' . $e->getMessage());
            return $this->error($e->getCode(), [], $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RateRequest $request)
    {


        try {
            $data = $this->rateService->store($request->validated());
            return $this->success(201, new RateResource($data), "New Rate Created Successfully");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error creating Rate data: ' . $e->getMessage());
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
            $data = $this->rateRepo->show($id);
            return $this->success(200, new RateResource($data),"Rate Showed Successfully.");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error retrieving Rate data: ' . $e->getMessage());
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
    public function update(RateRequest $request, $id)
    {


        try {
            $data = $this->rateService->update($request->validated(), $id);
            return $this->success(200, $data, "Rate Updated Successfully.");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error updating Rate data: ' . $e->getMessage());
            return $this->error($e->getCode(), [], $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rate $rate)
    {

        try {
            if (count($rate->assessmentResults) == 0) {
                $rate->delete();
                $data = '';
                return $this->success(200, $data, "Rate deleted successfully.");
            } else {
                $msg = 'Sorry,cannot delete because there are some relationships remaining';
                return $this->error(500, $msg, 'Internal Server Error');
            }
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error deleting Rate:' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        }
    }
}
