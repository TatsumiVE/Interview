<?php

namespace App\Http\Controllers\Api;

use Exception;
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

        $this->middleware('permission:dashboardView', ['only' => ['index']]);
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
}
