<?php

namespace App\Services\Candidate;

use App\Models\Candidate;
use App\Models\SpecificLanguage;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponser;

class CandidateService implements CandidateServiceInterface
{
  use ApiResponser;

  //   public function store($request)
  //   {

  //     $validatedData = $request->validate([
  //       'name' => 'required',
  //       'email' => 'required|email|unique:candidates,email',
  //       'gender' => 'required',
  //       'phone_number' => 'required|regex:/^[0-9]{10,}$/|unique:candidates,phone_number',
  //       'residential_address' => 'required',
  //       'date_of_birth' => 'required|date',
  //       'cv_path'  => 'required',
  //       'willingness_to_travel' => '',
  //       'expected_salary' => '',
  //       'last_salary' => '',
  //       'earliest_starting_date' => '',
  //       'position_id' => 'required|exists:positions,id',
  //       'agency_id' => 'required| exists:agencies,id',
  //       'status' => '',
  //       'data.*.experience.month' => 'required|integer|between:1,12',
  //       'data.*.experience.year' => 'required|integer|between:0,30',
  //       'data.*.devlanguage_id' => 'required',
  //     ]);

  //     $candidate = null;

  //      DB::transaction(function () use ($validatedData) {

  //       $candidate = Candidate::create($validatedData);

  //       foreach ($validatedData['data'] as $requestData) {
  //         $experience = $requestData['experience']['month'] + $requestData['experience']['year'] * 12;
  //         SpecificLanguage::create([
  //           'experience' => $experience,
  //           'devlanguage_id' => $requestData['devlanguage_id'],
  //           'candidate_id' => $candidate->id


  //         ]);
  //       }
  //       return $candidate;

  //     }

  // );

  //   }


  public function store($request)
  {
    $validatedData = $request->validate([
      'name' => 'required',
      'email' => 'required|email',
      'gender' => 'required',
      'phone_number' => 'required|regex:/^[0-9]{10,}$/',
      'residential_address' => 'required',
      'date_of_birth' => 'required|date|before_or_equal:2005-12-31',
      'cv_path'  => 'required',
      'willingness_to_travel' => '',
      'expected_salary' => '',
      'last_salary' => '',
      'earliest_starting_date' => '',
      'position_id' => 'required|exists:positions,id',
      'agency_id' => 'required| exists:agencies,id',
      'status' => '',
      'data.*.experience.month' => 'required|integer',
      'data.*.devlanguage_id' => 'required',
    ]);


    $candidate = null;

    DB::transaction(function () use ($validatedData, &$candidate) {
      $candidate = Candidate::create($validatedData);

      foreach ($validatedData['data'] as $requestData) {
        SpecificLanguage::create([
          'experience' => $requestData['experience']['month'],
          'devlanguage_id' => $requestData['devlanguage_id'],
          'candidate_id' => $candidate->id
        ]);
      }
    });


    return $candidate;
  }


  public function update($request, $id)
  {

    $validatedData = $request->validate([
      'name' => 'required',
      'email' => 'required|email',
      'gender' => 'required',
      'phone_number' => 'required|regex:/^[0-9]{10,}$/',
      'residential_address' => 'required',
      'date_of_birth' => 'required|date|before_or_equal:2005-12-31',
      'cv_path'  => 'required',
      'willingness_to_travel' => '',
      'expected_salary' => '',
      'last_salary' => '',
      'earliest_starting_date' => '',
      'position_id' => 'required|exists:positions,id',
      'agency_id' => 'required| exists:agencies,id',
      'status' => '',
      'data.*.experience.month' => 'required',
      'data.*.devlanguage_id' => 'required',
    ]);

    return DB::transaction(function () use ($validatedData, $id) {
      $candidate = Candidate::findOrFail($id);
      $candidate->update($validatedData);
      $candidate->specificLanguages()->delete();
      foreach ($validatedData['data'] as $requestData) {

        SpecificLanguage::create([
          'experience' => $requestData['experience']['month'],
          'devlanguage_id' => $requestData['devlanguage_id'],
          'candidate_id' => $candidate->id,
        ]);
      }
    });
  }
}
