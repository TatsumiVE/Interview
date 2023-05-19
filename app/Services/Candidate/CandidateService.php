<?php

namespace App\Services\Candidate;

use App\Models\Candidate;
use App\Models\SpecificLanguage;
use Illuminate\Support\Facades\DB;

class CandidateService implements CandidateServiceInterface
{


  public function store($request)
  {

    $validatedData = $request->validate([
      'name' => 'required',
      'email' => 'required|email',
      'gender' => 'required',
      'phone_number' => 'required',
      'residential_address' => 'required',
      'date_of_birth'  => 'required | date ',
      'cv_path'  => 'required',
      'willingness_to_travel' => '',
      'expected_salary' => '',
      'last_salary' => '',
      'earliest_starting_date' => '',
      'position_id' => 'required',
      'agency_id' => 'required',
      'data.*.experience.month' => 'required|integer',
      'data.*.experience.year' => 'required|integer',
      'data.*.devlanguage_id' => 'required',
    ]);

    DB::transaction(function () use ($validatedData) {
      // Create the candidate
      $candidate = Candidate::create($validatedData);

      foreach ($validatedData['data'] as $requestData) {
        $experience = $requestData['experience']['month'] + $requestData['experience']['year'] * 12;
        SpecificLanguage::create([
          'experience' => $experience,
          'devlanguage_id' => $requestData['devlanguage_id'],
          'candidate_id' => $candidate->id
        ]);
      }
    });


    // DB::transaction(function () use ($validatedData) {
    //   $candidate = Candidate::create($validatedData);
    //   $candidate = Candidate::create($request->only([
    //     'name',
    //     'email',
    //     'gender',
    //     'phone_number',
    //     'residential_address',
    //     'date_of_birth',
    //     'cv_path',
    //     'willingness_to_travel',
    //     'expected_salary',
    //     'last_salary',
    //     'earliest_starting_date',
    //     'position_id',
    //     'agency_id',
    //   ]));

    //   $requestDatas = $request->input('data');
    //   foreach ($$validatedData as $requestData) {
    //     $experience = $requestData["'experience'"]["'month'"] + $requestData["'experience'"]["'year'"] * 12;
    //     SpecificLanguage::create([

    //       'experience' => $experience,
    //       'devlanguage_id' => $requestData["'devlanguage_id'"],
    //       'candidate_id' => $candidate->id
    //     ]);
    //   }
    // });
  }
  public function update($data, $id)
  {


    $result = Candidate::with('specificLanguage.devlanguage')->where('id', $id)->first();

    return $result->update($data);
  }
}
