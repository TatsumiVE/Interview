<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Repositories\CandidateDetail\CandidateDetailRepoInterface;

class CandidateDetailController extends Controller
{

    use ApiResponser;

    private  CandidateDetailRepoInterface $candidateDetailRepo;

    public function __construct(CandidateDetailRepoInterface $candidateDetailRepo)
    {
        $this->candidateDetailRepo = $candidateDetailRepo;

        $this->middleware('permission:getAllCandidates', ['only' => ['index']]);

        $this->middleware('permission:getCandidateById', ['only' => ['candidateDetail']]);

      
    }

    public function index()
    {
        try {
            $data = $this->candidateDetailRepo->get();
            return $this->success(200, $data, 'Candidate Reterived successfully');
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error retrieving Candidate data: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }
    public function candidateDetail($id)
    {

        try {
            $data = $this->candidateDetailRepo->show($id);
            return $this->success(200, $data, 'CandidateDetail Data retrieved successfully');
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error retrieving CandidateDetail data: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }

  
}
