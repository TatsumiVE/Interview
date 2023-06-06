<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Agency;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\AgencyRequest;
use App\Http\Resources\AgencyResource;
use Illuminate\Support\Facades\Redirect;
use App\Services\Agency\AgencyServiceInterface;
use App\Repositories\Agency\AgencyRepoInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AgencyController extends Controller
{

    use ApiResponser;
    private AgencyRepoInterface $agencyRepo;
    private AgencyServiceInterface $agencyService;

    public function __construct(AgencyRepoInterface $agencyRepo, AgencyServiceInterface $agencyService)
    {
        $this->agencyRepo = $agencyRepo;
        $this->agencyService = $agencyService;
        $this->middleware('permission:agencyList', ['only' => ['index']]);
        $this->middleware('permission:agencyView', ['only' => ['index']]);

        $this->middleware('permission:agencyCreate', ['only' => ['store']]);
        $this->middleware('permission:agencyUpdate', ['only' => ['update']]);
        $this->middleware('permission:agencyDelete', ['only' => ['destroy']]);
        $this->middleware('permission:agencyShow', ['only' => ['show']]);
    }

    public function index()
    {
        try {
            $data = $this->agencyRepo->get();
            return $this->success(200, AgencyResource::collection($data), 'Agency Reterived successfully');
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error retrieving Agency data: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }


    public function store(AgencyRequest $request)
    {
        try {
            $data = $this->agencyService->store($request->validated());
            return $this->success(201, new AgencyResource($data), "Agency created successfully.");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error creating Agency: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }


    public function show($id)
    {
        try {
            $result = $this->agencyRepo->show($id);
            return $this->success(200, new AgencyResource($result), 'Agency showed successfully');
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error retrieving Agency data: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }


    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [

                'name' => ['required', 'string', Rule::unique('agencies')->ignore($id), 'regex:/^[^\d\W]+$/'],
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


            $data = $this->agencyService->update($request->all(), $id);
            return $this->success(200, $data, 'Agency updated successfully');
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error updating agency: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }


    public function destroy(Agency $agency)
    {
        try {
            if (count($agency->candidates) === 0) {
                $agency->delete();
                $data = '';
                return $this->success(200, $data, 'Agency deleted successfully');
            } else {
                $msg = 'Cannot delete because there are candidates remaining';
                return $this->error(500, $msg, 'Internal Server Error');
            }
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error deleting agency: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        }
    }
}
