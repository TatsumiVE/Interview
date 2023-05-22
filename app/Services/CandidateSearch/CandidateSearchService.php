<?php

namespace App\Services\CandidateSearch;

use Illuminate\Support\Facades\DB;

class CandidateSearchService implements CandidateSearchServiceInterface
{
  public function search($request)
  {
    return DB::table('candidates')
    ->join('specific_languages', 'candidates.id', '=', 'specific_languages.candidate_id')
    ->join('devlanguages', 'specific_languages.devlanguage_id', '=', 'devlanguages.id')
    ->join('interviews', 'candidates.id', '=', 'interviews.candidate_id')
    ->join('interview_stages', 'interviews.interview_stage_id', '=', 'interview_stages.id')
    ->join('remarks', 'interview_stages.id', '=', 'remarks.interview_stage_id')
    ->select('candidates.*', 'remarks.grade','specific_languages.devlanguage_id')
    ->where('devlanguages.id', $request['language_id'])
    ->where('grade',$request['grade'])
    ->get();

  }
}
