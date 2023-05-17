<?php

namespace App\Repositories\Language;

use App\Models\Devlanguage;
use App\Models\Language;

class LanguageRepository implements LanguageRepoInterface
{
    public function get()
    {
        return Devlanguage::all();
    }
    public function show($id)
    {
        return Devlanguage::where('id', $id)->first();
    }
}
