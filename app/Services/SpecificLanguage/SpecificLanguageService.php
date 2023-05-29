<?php

namespace App\Services\SpecificLanguage;

use App\Models\Candidate;

class SpecificLanguageService implements SpecificLanguageServiceInterface
{
  public function store($data)
  {
    $data = Candidate::where('id', $data)->first();
  }
}
