<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Services\Language\LanguageServiceInterface;
use Exception;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $languageService;
    public function __construct(LanguageServiceInterface $languageService)
    {
        $this->languageService = $languageService;
    }
    public function index()
    {
        $data=Language::all();
        // return response()->json($data);
        try{
            return response()->json([
                'status'=>'success',
                'message'=>'Language List',
                'data'=>$data
            ],200);
        }
        catch(Exception $e){
            return response()->json([
                'status'=>'error',
                'message'=>$e->getMessage(),
                'data'=>$data
            ],500);
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
        try{
            $data = $this->languageService->store($request->all());
            return response()->json([
                'status'=> "success",
                'message'=> "Language store success",
                'data' => $data
            ],200);

        }catch(Exception $e){
            return response()->json([
                'status'=> "error",
                'message'=> $e->getMessage(),
                'data' => $data
            ],500);
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
        try{
            $data = $this->languageService->update($request->all(),$id);
            return response([
                'status'=> "success",
                'message'=> "Language update success",
                'data' => $data
            ],200);
          }catch(Exception $e){
             return response([
                'status'=> "error",
                'message'=> $e->getMessage(),
                'data' => $data
             ],500);
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
            return response([
               'status'=> "success",
               'message' => "Language delete success",
               'data' => $data
            ],200);
          }catch(Exception $e)
          {
            return response([
               'status' => "error",
               'message' => $e->getMessage(),
               'data' => $data
            ],500);
          }
    }
}

