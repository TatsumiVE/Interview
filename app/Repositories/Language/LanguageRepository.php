<?php
namespace App\Repositories\Language;

use App\Models\Language;

class LanguageRepository implements LanguageRepoInterface{
    public function get(){
        return Language::all();

    }
    public function show($id){
        return Language::where('id',$id)->first();

    }
}
