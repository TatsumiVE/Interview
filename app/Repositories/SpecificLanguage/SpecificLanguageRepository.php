<?php

namespace App\Repositories\SpecificLanguage;

use App\Models\SpecificLanguage;


class SpecificLanguageRepository implements SpecificLanguageRepoInterface
{
  public function get()
  {
    return SpecificLanguage::with(['language', 'candidate'])->get();
  }
  public function show($id)
  {
    return SpecificLanguage::with(['language', 'candidate'])->where('id', $id)->first();
  }
}
