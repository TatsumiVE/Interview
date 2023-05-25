<?php

namespace App\Services\Position;

interface PositionServiceInterface
{
    public function store($request);
    public function update($request, $id);
    // public function destroy($id);
}
