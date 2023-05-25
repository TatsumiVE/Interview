<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandidateSearchRequest;
use App\Services\CandidateSearch\CandidateSearchServiceInterface;
use App\Traits\ApiResponser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidateSearchController extends Controller
{
    use ApiResponser;

    private  $candidateSearchService;

    public function __construct(CandidateSearchServiceInterface $candidateSearchService)
    {
        $this->candidateSearchService = $candidateSearchService;

        $this->middleware('permission:candidateSearch',['only'=>['search']]);

    }

    public function search(CandidateSearchRequest $request)
    {
        try {
            $validateData = $request->validated();

            $candidates=$this->candidateSearchService->search($validateData);

            if (!$candidates->isEmpty()) {
                    return $this->success(200, $candidates, "Candidates retrieved successfully for search.");
                } else {
                    return $this->error(404, "No candidates found for this search.", "Not Found.");
                }
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        }

    }
}
