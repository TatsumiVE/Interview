<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use App\Http\Requests\RateRequest;
use Illuminate\Http\Request;
use App\Http\Resources\RateResource;
use App\Models\Rate;
use App\Repositories\Rate\RateRepoInterface;
use App\Services\Rate\RateServiceInterface;
use Exception;

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
        $this->middleware('permission:rateCreate', ['only' => ['store']]);
        $this->middleware('permission:rateUpdate', ['only' => ['update']]);
        $this->middleware('permission:rateDelete', ['only' => ['destroy']]);
        $this->middleware('permission:rateShow', ['only' => ['show']]);
    }
    public function index()
    {


        try {
            $data = $this->rateRepo->get();

            return $this->success(200, RateResource::collection($data));
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
    public function store(RateRequest $request)
    {


        try {
            $data = $this->rateService->store($request->validated());
            return $this->success(200, new RateResource($data));
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
            $data = $this->rateRepo->show($id);
            return $this->success(200, new RateResource($data));
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
    public function update(RateRequest $request, $id)
    {


        try {
            $data = $this->rateService->update($request->validated(), $id);
            return $this->success(200, $data, "Update Rate Success");
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
            $data = Rate::where('id', $id)->first();
            $data->delete();
            return $this->success(200, $data, "Delete Rate success");
        } catch (Exception $e) {
            return $this->error($e->getCode(), [], $e->getMessage());
        }
    }
}
