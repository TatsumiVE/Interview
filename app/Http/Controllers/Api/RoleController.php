<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Http\Resources\RoleResource;
use App\Repositories\Role\RoleRepoInterface;
use App\Services\Role\RoleServiceInterface;
use App\Traits\ApiResponser;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
    use ApiResponser;

    private $roleRepo, $roleService;
    public function __construct(RoleRepoInterface $roleRepo, RoleServiceInterface $roleService)
    {
        $this->roleRepo = $roleRepo;
        $this->roleService = $roleService;
    }

    public function index()
    {
        try {
            $data = $this->roleRepo->get();
            return $this->success(200, RoleResource::collection($data), "Role retrieved successfully.");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }


    public function store(RoleRequest $request)
    {
        try {
            $validateData = $request->validated();

            $data = $this->roleService->store($validateData);

            return $this->success(200, new RoleResource($data), "Role created successfully.");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }

    public function show($id)
    {
        try {
            $data = $this->roleRepo->show($id);
            return $this->success(200, new RoleResource($data), "Role showed successfully.");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'name' => 'required|string|unique:roles,name,' . $id,
                // 'permission_name' => 'required'
            ]);

            $data = $this->roleService->update($validateData, $id);

            return $this->success(200, new RoleResource($data), "Role updated successfully.");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }


    public function destroy($id)
    {
        try {
            $data = $this->roleService->destroy($id);
            return $this->success(200, $data, "Role deleted successfully.");
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }
}
