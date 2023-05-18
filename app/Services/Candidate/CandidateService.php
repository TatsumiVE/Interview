<?php

namespace App\Services\Candidate;

use App\Models\Candidate;
use App\Models\SpecificLanguage;
use Illuminate\Support\Facades\DB;

class CandidateService implements CandidateServiceInterface
{


  public function store($request)
  {


    DB::transaction(function () use ($request) {
      $candidate = Candidate::create($request->only([
        'name',
        'email',
        'gender',
        'phone_number',
        'residential_address',
        'date_of_birth',
        'cv_path',
        'willingness_to_travel',
        'expected_salary',
        'last_salary',
        'earliest_starting_date',
        'position_id',
        'agency_id',
      ]));

      $requestDatas = $request->input('data');
      foreach ($requestDatas as $requestData) {
        $experience = $requestData["'experience'"]["'month'"] + $requestData["'experience'"]["'year'"] * 12;
        SpecificLanguage::create([

          'experience' => $experience,
          'devlanguage_id' => $requestData["'devlanguage_id'"],
          'candidate_id' => $candidate->id
        ]);

        // $specificLanguage = new SpecificLanguage();
        // $specificLanguage->language_id = $languageId;

        // $specificLanguage->candidate_id =  $candidate->id;
        // $specificLanguage->save();
      }
    });
  }
  public function update($data, $id)
  {


    $result = Candidate::with('specificLanguage.devlanguage')->where('id', $id)->first();

    return $result->update($data);
  }
}
