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
        $this->middleware('permission:languageList', ['only' => ['index']]);
        $this->middleware('permission:languageView', ['only' => ['index']]);

        $this->middleware('permission:languageCreate', ['only' => ['store']]);
        $this->middleware('permission:languageUpdate', ['only' => ['update']]);
        $this->middleware('permission:languageDelete', ['only' => ['destroy']]);
        $this->middleware('permission:languageShow', ['only' => ['show']]);
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
            return $this->success(200, DevLanguageResource::collection($data), 'Language data retrieved successfully');
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error retrieving DevLanguage data: ' . $e->getMessage());
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
            return $this->success(201, new DevLanguageResource($data), "New Language Created Successfully");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error creating DevLanguage: ' . $e->getMessage());
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
            return $this->success(200, new DevLanguageResource($data), 'Language Show Successfully');
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error retrieving DevLanguage data: ' . $e->getMessage());
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
            return $this->success(200, $data, "Language updated successfully");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error updating DevLangugage: ' . $e->getMessage());
            return $this->error($e->getCode(), [], $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Devlanguage $devlanguage)
    {
        try {
            if (count($devlanguage->specificLanguages) == 0) {
                $devlanguage->delete();
                $data = '';
                return $this->success(200, $data, 'Language successfully deleted');
            } else {
                $msg = 'Sorry,cannot delete because there are some relationships remaining';
                return $this->error(500, $msg, 'Internal Server Error');
            }
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error deleting agency: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        }
    }
}
