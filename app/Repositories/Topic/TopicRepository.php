<?php

namespace App\Repositories\Topic;

use Exception;
use App\Models\Topic;


class TopicRepository implements TopicRepoInterface
{
    public function get()
    {
        try {
            return Topic::all();
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }


    public function show($id)
    {
        try {
            $data = Topic::where('id', $id)->first();
            return $data;
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}
