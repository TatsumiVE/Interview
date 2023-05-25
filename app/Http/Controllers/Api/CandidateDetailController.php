<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CandidateDetail\CandidateDetailRepoInterface;

class CandidateDetailController extends Controller
{

    use ApiResponser;

    private  CandidateDetailRepoInterface $candidateDetailRepo;

    public function __construct(CandidateDetailRepoInterface $candidateDetailRepo)
    {
        $this->candidateDetailRepo = $candidateDetailRepo;

        $this->middleware('permission:candidateDetail',['only'=>['candidateDetail']]);

    }
    public function candidateDetail($id)
    {

        try {

            $data = $this->candidateDetailRepo->show($id);

            return $this->success(200, $data, 'CandidateDetail data returned successfully');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }
}
