<?php

namespace App\Http\Controllers\Api;

use App\Models\InterviewStage;
use Exception;

use App\Models\Interview;
use App\Traits\ApiResponser;
use App\Models\SpecificLanguage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class BarChartController extends Controller
{
    use ApiResponser;

    public function __construct()
    {
        $this->middleware('permission:dashboardView', ['only' => ['index', 'candidateCountByStage']]);

      
    }
    public function index()
    {
        try {
            $candidateCounts = SpecificLanguage::select('devlanguage_id', DB::raw('COUNT(candidate_id) as count'))
                ->groupBy('devlanguage_id')
                ->get();
            return $this->success(200, $candidateCounts, 'success');
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error retrieving BarChart data: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }



    public function candidateCountByStage()
    {
        $candidateCount = Interview::select('interview_stage_id', DB::raw('COUNT(candidate_id) as count'))
            ->groupBy('interview_stage_id')
            ->get();

        // Transform the data into the required format for the response
        $responseData = [];
        foreach ($candidateCount as $count) {
            $stage = InterviewStage::find($count->interview_stage_id);
            $responseData[] = [
                'stage_name' => $stage->stage_name,
                'count' => $count->count,
            ];
        }

        $stage1Count = $this->getCountByStageName($responseData, 1);
        $stage2Count = $this->getCountByStageName($responseData, 2);
        $stage3Count = $this->getCountByStageName($responseData, 3);

        $result = [
            'stage1_count' => $stage1Count,
            'stage2_count' => $stage2Count,
            'stage3_count' => $stage3Count,
        ];

        return $this->success(200, $result, 'success');
    }

    private function getCountByStageName($responseData, $stageName)
    {
        $count = 0;
        foreach ($responseData as $data) {
            if ($data['stage_name'] == $stageName) {
                $count += $data['count'];
            }
        }
        return $count;
    }

}
