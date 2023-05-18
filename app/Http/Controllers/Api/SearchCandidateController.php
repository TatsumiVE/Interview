<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SearchCandidateController extends Controller
{
    public function search(Request $request){
        $specific = DB::table('specific_languages')
        ->where('devlanguage_id', $request->devlanguage_id)
        ->get();
         $id = $specific->pluck('candidate_id');
         $candidates = DB::table('candidates')
         ->join('specific_languages', 'candidates.id', '=', 'specific_languages.candidate_id')
         ->join('devlanguages', 'specific_languages.devlanguage_id', '=', 'devlanguages.id')
         ->join('interviews', 'candidates.id', '=', 'interviews.candidate_id')
         ->join('interview_stages', 'interviews.interview_stage_id', '=', 'interview_stages.id')
         ->join('remarks', 'interview_stages.id', '=', 'remarks.interview_stage_id')
         ->select('candidates.*', 'remarks.grade','specific_languages.devlanguage_id')
         ->where('devlanguages.id', $request->language_id)
         ->where('grade',$request->grade)
         ->get();
         return $candidates;
        return $id;
    }

}
