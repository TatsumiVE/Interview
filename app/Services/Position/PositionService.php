<?php 

namespace App\Services\Position;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Support\Facades\DB;

class PositionService implements PositionServiceInterface{
    public function store($request){      
         return Position::create($request);               
    
       
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