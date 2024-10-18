<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\building;
use App\Http\Controllers\Controller;

class ChartController extends Controller
{
    public function getData()
    {
        $constructedCount = Building::where('status', 'constructed')->count();
        $underConstructionCount = Building::where('status', 'under construction')->count();

        return response()->json([
            'constructed' => $constructedCount,
            'underConstruction' => $underConstructionCount
        ]);
    }
}
