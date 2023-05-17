<?php

namespace App\Services\Candidate;

use App\Models\Candidate;
use App\Models\SpecificLanguage;

class CandidateService implements CandidateServiceInterface
{


  public function store($data)
  {

    $candidate = Candidate::create($data->only([
      'name',
      'email',
      'gender',
      'phone_number',
      'residentail_address',
      'date_of_birth',
      'cv_path',
 
      'willingness_to_travel',
      'expected_salary',
      'last_salary',
      'earliest_starting_date',
      'positions_id',
      'agencies_id',
    ]));


    $languages = $data->input('languages', []);

    foreach ($languages as $languageId) {

      $specificLanguage = new SpecificLanguage();
      $specificLanguage->language_id = $languageId;

      $specificLanguage->candidate_id =  $candidate->id;
      $specificLanguage->save();
    }
  }
  public function update($data, $id)
  {

    $result = Candidate::where('id', $id)->first();
    return $result->update($data);
  }
}
