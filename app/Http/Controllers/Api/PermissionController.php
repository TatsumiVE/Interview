<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Http\Resources\PermissionResource;
use App\Repositories\Permission\PermissionRepoInterface;
use App\Services\Permission\PermissionServiceInterface;
use App\Traits\ApiResponser;
use Exception;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    use ApiResponser;

    private $permissionRepo, $permissionService;
    public function __construct(PermissionRepoInterface $permissionRepo, PermissionServiceInterface $permissionService)
    {
        $this->permissionRepo = $permissionRepo;
        $this->permissionService = $permissionService;
    }
    public function index()
    {
        try {
            $data = $this->permissionRepo->get();
            return $this->success(200, PermissionResource::collection($data), "Permission retrieved successfully.");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }


    public function store(PermissionRequest $request)
    {
        try {
            $validateData = $request->validated();

            $data = $this->permissionService->store($validateData);

            return $this->success(201, new PermissionResource($data), "Permission created successfully.");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }

    public function show($id)
    {
        try {
            $data = $this->permissionRepo->show($id);
            return $this->success(200, new PermissionResource($data), "Permission showed successfully.");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'name' => 'required|string|unique:permissions,name,' . $id,
            ]);

            $data = $this->permissionService->update($validateData, $id);

            return $this->success(200, $data, "Permission updated successfully.");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }


    public function destroy($id)
    {
        try {
            $data = $this->permissionService->destroy($id);
            return $this->success(200, $data, "Permission deleted successfully.");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }
}
