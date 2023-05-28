<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SpecificLanguage;
use App\Traits\ApiResponser;
use Exception;
use Illuminate\Support\Facades\DB;

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
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        };
    }
}
