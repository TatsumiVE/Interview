<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Http\Resources\DepartmentResource;
use App\Repositories\Department\DepartmentRepoInterface;
use App\Services\Department\DepartmentServiceInterface;
use App\Traits\ApiResponser;
use Exception;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    use ApiResponser;
    private  $departmentRepo, $departmentService;
    public function __construct(DepartmentRepoInterface $departmentRepo, DepartmentServiceInterface $departmentService)
    {
        $this->departmentRepo = $departmentRepo;
        $this->departmentService = $departmentService;

        // $this->middleware('permission:departmentList',['only'=>['index']]);
        // $this->middleware('permission:departmentCreate',['only'=>['store']]);
        // $this->middleware('permission:departmentUpdate',['only'=>['update']]);
        // $this->middleware('permission:departmentDelete',['only'=>['destroy']]);
        // $this->middleware('permission:departmentShow',['only'=>['show']]);
    }

    public function index()
    {
        try {
            $data = $this->departmentRepo->get();
            return $this->success(200, DepartmentResource::collection($data), "Department retrieved successfully.");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }


    public function store(DepartmentRequest $request)
    {
        try {
            $validateData = $request->validated();

            $data = $this->departmentService->store($validateData);

            return $this->success(200, new DepartmentResource($data), "Department created successfully.");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }

    public function show($id)
    {
        try {
            $data = $this->departmentRepo->show($id);
            return $this->success(200, new DepartmentResource($data), "Department showed successfully.");
        } catch (Exception $e) {
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
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }


    public function destroy($id)
    {
        try {
            $data = $this->departmentService->destroy($id);
            return $this->success(200, $data, "Department deleted successfully.");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }
}
