<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DevLanguageRequest;
use App\Http\Resources\DevLanguageResource;
use App\Models\Devlanguage;
use App\Repositories\DevLanguage\DevLanguageRepoInterface;
use App\Services\DevLanguage\DevLanguageServiceInterface;
use App\Traits\ApiResponser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DevLanguageController extends Controller
{

    use ApiResponser;
    private DevLanguageRepoInterface $DevLanguageRepo;
    private DevLanguageServiceInterface $DevLanguageService;


    public function __construct(DevLanguageRepoInterface $DevLanguageRepo,  DevLanguageServiceInterface $DevLanguageService)
    {
        $this->DevLanguageRepo = $DevLanguageRepo;
        $this->DevLanguageService = $DevLanguageService;

        // $this->middleware('permission:languageList',['only'=>['index']]);
        // $this->middleware('permission:languageCreate',['only'=>['store']]);
        // $this->middleware('permission:languageUpdate',['only'=>['update']]);
        // $this->middleware('permission:languageDelete',['only'=>['destroy']]);
        // $this->middleware('permission:languageShow',['only'=>['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $data = $this->DevLanguageRepo->get();
            return $this->success(200, DevLanguageResource::collection($data), 'success');
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
    public function store(DevLanguageRequest $request)
    {
        try {
            $data = $this->DevLanguageService->store($request->validated());
            return $this->success(200, new DevLanguageResource($data));
        } catch (Exception $e) {
            Log::channel('api')->debug('Your log message here');
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
            $data = $this->DevLanguageRepo->show($id);
            return $this->success(200, new DevLanguageResource($data), 'success');
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
    public function update(DevLanguageRequest $request, $id)
    {
        try {
            $data = $this->DevLanguageService->update($request->all(), $id);
            return $this->success(200, $data, "Language updated success");
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
            $data = Devlanguage::where('id', $id)->first();
            $data->delete();
            return $this->success(200, $data, "Delete topic success");
        } catch (Exception $e) {
            return $this->error($e->getCode(), [], $e->getMessage());
        }
    }
}
