<?php 

namespace App\Services\Position;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Support\Facades\DB;

class PositionService implements PositionServiceInterface{
    public function store($request){
        return DB::transaction(function () use ($request) {
            $department_id = $request['department_id'];
            $department = Department::where('id', $department_id)->first();
            
            if(isset($department)){
                return Position::create($request);
            }            
          
        });
       
    }
    public function update($request,$id){
        $position=Position::where('id',$id)->first();
        return $position->update($request);
    }

    public function destroy($id){
        $position=Position::where('id',$id)->first();
        return $position->delete();
    }
}