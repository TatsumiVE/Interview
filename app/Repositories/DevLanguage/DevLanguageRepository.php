<?php

namespace App\Repositories\DevLanguage;

use App\Models\Devlanguage;


class DevLanguageRepository implements DevLanguageRepoInterface
{
    public function get()
    {
        return Devlanguage::orderBy('id','desc')->get();
    }
    public function show($id)
    {
        return Devlanguage::where('id', $id)->first();
    }
}
