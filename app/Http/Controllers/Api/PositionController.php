<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Position;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\PositionRequest;
use App\Http\Resources\PositionResource;
use App\Http\Controllers\Api\BaseController;
use App\Services\Position\PositionServiceInterface;
use App\Repositories\Position\PositionRepoInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PositionController extends Controller
{
    use ApiResponser;
    private $positionRepo, $positionService;
    public function __construct(PositionRepoInterface $positionRepo, PositionServiceInterface $positionService)
    {
        $this->positionRepo = $positionRepo;
        $this->positionService = $positionService;
        $this->middleware('permission:positionList', ['only' => ['index']]);
        $this->middleware('permission:positionView', ['only' => ['index']]);

        $this->middleware('permission:positionCreate', ['only' => ['store']]);
        $this->middleware('permission:positionUpdate', ['only' => ['update']]);
        $this->middleware('permission:positionDelete', ['only' => ['destroy']]);
        $this->middleware('permission:positionShow', ['only' => ['show']]);
    }


    public function index()
    {
        try {
            $data = $this->positionRepo->get();
            return $this->success(200, PositionResource::collection($data), "Position retrieved successfully.");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error retrieving Position data: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }


    public function store(PositionRequest $request)
    {
        try {
            $validateData = $request->validated();
            $data = $this->positionService->store($validateData);

            return $this->success(201, $data, "Position created successfully.");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error creating Position data: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }

    public function show($id)
    {
        try {
            $data = $this->positionRepo->show($id);
            return $this->success(200, new PositionResource($data), "Position showed successfully.");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error retrieving Position data: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }


    public function update(Request $request, $id)
    {
        try {


            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', Rule::unique('positions')->ignore($id),'regex:/^[^\d\W]+$/'],
            ]);

            if ($validator->fails()) {
                $errorResponse = $validator->errors();

                $response = [
                    'status' => 'error',
                    'status_code' => 422,
                    'data' => $errorResponse,
                    'err_msg' => 'Validation Error.',
                ];

                return response()->json($response, 422);
            }



            $data = $this->positionService->update($request->all(), $id);
            return $this->success(200, $data, "Position updated successfully.");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error updating Position data: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }


    public function destroy(Position $position)
    {
        try {
            if (
                count($position->candidates) == 0 &&
                count($position->interviewers) == 0
            ) {
                $position->delete();
                $data = '';
                return $this->success(200, $data, "Position  successfully deleted.");
            } else {
                $msg = 'Sorry,cannot delete because there are some relationships remaining';
                return $this->error(500, $msg, 'Internal Server Error');
            }
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error deleting Position: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        }
    }
}
