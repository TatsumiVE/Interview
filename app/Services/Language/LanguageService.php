<?php

namespace App\Services\Language;

use App\Models\Language;
use Illuminate\Support\Facades\Storage;

class LanguageService implements LanguageServiceInterface{
    public function store($data){
        return Language::create($data);
    }

    public function update($request, $id)
    {
        $result = Language::where('id',$id)->first();
        return $result->update($request);

    }


}
