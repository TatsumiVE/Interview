<?php

namespace App\Services\DevLanguage;

use App\Models\Devlanguage;
use App\Models\Language;
use Illuminate\Support\Facades\Storage;

class DevLanguageService implements DevLanguageServiceInterface
{
    public function store($data)
    {
        return Devlanguage::create($data);
    }

    public function update($request, $id)
    {
        $result = Devlanguage::where('id', $id)->first();
        return $result->update($request);
    }
}
