<?php

namespace App\Services\DevLanguage;

interface DevLanguageServiceInterface
{
    public function store($data);
    public function update($request, $id);
}
