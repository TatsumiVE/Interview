<?php

namespace App\Services\Topic;

use App\Models\Topic;
use Exception;

class TopicService implements TopicServiceInterface
{
  public function store($data)
  {
    try {
      return Topic::create($data);
    } catch (Exception $exception) {
      throw new Exception($exception->getMessage());
    }
  }

  public function update($data, $id)
  {

    $result = Topic::where('id', $id)->first();
    return $result->update($data);
  }
}
