<?php

namespace App\Http\Controllers;

use App\Collection;
use App\People;
use App\QuarantineCenter;
use Illuminate\Http\Request;

class DataSummaryController extends Controller
{
    public function all()
    {
        return response()->json([
            'people_count' => People::all()->count(),
            'corvid_confirmed_count' => People::where('confirmed_corvid', true)->count(),
            'corvid_recovered_count' => People::where('current_corvid_state', 'RECOVERED')->count(),
            'corvid_fatalities_count' => People::where('current_corvid_state', 'DIED')->count(),
            'quarantined_count' => People::where('on_quarantine', true)->count(),
            'quarantine_centers_count' => QuarantineCenter::count()
        ]);
    }
}
