<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SpecificLanguageResource;
use App\Repositories\SpecificLanguage\SpecificLanguageRepoInterface;
use App\Traits\ApiResponser;
use Exception;
use Illuminate\Http\Request;

class SpecificController extends Controller
{
    use ApiResponser;
    private SpecificLanguageRepoInterface $specificLanguageRepo;

    public function __construct(SpecificLanguageRepoInterface $specificLanguageRepo)
    {
        $this->specificLanguageRepo = $specificLanguageRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $data = $this->specificLanguageRepo->get();
            return $this->success(200, SpecificLanguageResource::collection($data), 'success');
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
