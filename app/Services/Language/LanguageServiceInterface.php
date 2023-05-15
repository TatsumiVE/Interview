<?php

namespace App\Services\Language;

interface LanguageServiceInterface{
    public function store($data);
    public function update($request, $id);
}
