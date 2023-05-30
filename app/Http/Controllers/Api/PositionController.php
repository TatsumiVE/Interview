<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PositionRequest;
use App\Http\Resources\PositionResource;
use App\Models\Position;
use App\Repositories\Position\PositionRepoInterface;
use App\Services\Position\PositionServiceInterface;
use App\Traits\ApiResponser;
use Exception;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    use ApiResponser;
    private $positionRepo, $positionService;
    public function __construct(PositionRepoInterface $positionRepo, PositionServiceInterface $positionService)
    {
        $this->positionRepo = $positionRepo;
        $this->positionService = $positionService;

        $this->middleware('permission:positionList', ['only' => ['index']]);
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
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }


    public function store(PositionRequest $request)
    {
        try {
            $validateData = $request->validated();
            $data = $this->positionService->store($validateData);

            return $this->success(200, $data, "Position created successfully.");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }

    public function show($id)
    {
        try {
            $data = $this->positionRepo->show($id);
            return $this->success(200, new PositionResource($data), "Position showed successfully.");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'name' => 'required|string|unique:positions,name,' . $id,
            ]);

            $data = $this->positionService->update($validateData, $id);
            return $this->success(200, $data, "Position updated successfully.");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }


    public function destroy(Position $position)
    {
        if (
            count($position->candidates) == 0 ||
            count($position->interviewers) == 0
        ) {
            $position->delete();
            $data = '';
            return $this->success(200, $data, "Position  successfully deleted.");
        } else {
            $msg = 'Sorry,cannot delete because there are some relationships remaining';
            return $this->error(500, $msg, 'Internal Server Error');
        }
    }
}
