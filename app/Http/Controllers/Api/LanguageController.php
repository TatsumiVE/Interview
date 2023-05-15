<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use App\Http\Resources\LanguageResource;
use App\Models\Language;
use App\Services\Language\LanguageServiceInterface;
use App\Repositories\Language\LanguageRepoInterface;
use Exception;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use ApiResponser;
    private LanguageRepoInterface $languageRepo;
    private LanguageServiceInterface $languageService;


    public function __construct(LanguageRepoInterface $languageRepo,LanguageServiceInterface $languageService)
    {
        $this->languageRepo = $languageRepo;
        $this->languageService = $languageService;

    }
    public function index()
    {

        // return response()->json($data);
        try{
            $data=Language::all();
            return $this->success(200, LanguageResource::collection($data));
        }
        catch(Exception $e){
            return $this->error($e->getCode(),[],$e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageRequest $request)
    {
        try{
            $data = $this->languageService->store($request->validated());
            return $this->success(200, new LanguageResource($data));

        }catch(Exception $e){
            return $this->error($e->getCode(),[],$e->getMessage());
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

        try{
            $data = $this->languageRepo->show($id);
            return $this->success(200, new LanguageResource($data));

        }catch(Exception $e){
            return $this->error($e->getCode(),[],$e->getMessage());
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
        try{
            $data = $this->languageService->update($request->all(),$id);
            return $this->success(200, $data,"Language updated");
          }catch(Exception $e){
            return $this->error($e->getCode(),[],$e->getMessage());
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
        try{
            $data = Language::where('id',$id)->first();
            $data->delete();
            return $this->success(200, $data,"Delete topic success");
          }catch(Exception $e)
          {
            return $this->error($e->getCode(),[],$e->getMessage());
          }
    }
}

