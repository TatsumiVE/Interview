<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Department;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Http\Resources\DepartmentResource;
use App\Services\Department\DepartmentServiceInterface;
use App\Repositories\Department\DepartmentRepoInterface;

class DepartmentController extends Controller
{
    use ApiResponser;
    private  $departmentRepo, $departmentService;
    public function __construct(DepartmentRepoInterface $departmentRepo, DepartmentServiceInterface $departmentService)
    {
        $this->departmentRepo = $departmentRepo;
        $this->departmentService = $departmentService;

        $this->middleware('permission:departmentList', ['only' => ['index']]);
        $this->middleware('permission:departmentCreate', ['only' => ['store']]);
        $this->middleware('permission:departmentUpdate', ['only' => ['update']]);
        $this->middleware('permission:departmentShow', ['only' => ['show']]);
        $this->middleware('permission:departmentDelete', ['only' => ['destroy']]);
    }

    public function index()
    {
        try {
            $data = $this->departmentRepo->get();
            return $this->success(200, DepartmentResource::collection($data), "Department retrieved successfully.");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error retrieving Department data: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }


    public function store(DepartmentRequest $request)
    {
        try {
            $validateData = $request->validated();

            $data = $this->departmentService->store($validateData);

            return $this->success(201, new DepartmentResource($data), "Department created successfully.");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error creating Department: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }

    public function show($id)
    {
        try {
            $data = $this->departmentRepo->show($id);
            return $this->success(200, new DepartmentResource($data), "Department showed successfully.");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error retrieving department data: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'name' => 'required|string|unique:departments,name,' . $id,
            ]);

            $data = $this->departmentService->update($validateData, $id);
            return $this->success(200, $data, "Department updated successfully.");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error updating department: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }


    public function destroy(Department $department)
    {
        try {
            if (count($department->interviewers) === 0) {
                $department->delete();
                $data = '';
                return $this->success(200, $data, "Department deleted successfully.");
            } else {
                $msg = 'Sorry,cannot delete because there are some relationships remaining';
                return $this->error(500, $msg, 'Internal Server Error');
            }
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error deleting department: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        }
    }
}
