<?php

namespace App\Http\Controllers;

use App\Models\CovidStatistic;
use Illuminate\Http\Request;

class CovidStatisticController extends Controller
{
    /**
     * Get all CovidStatistic records.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statistics = CovidStatistic::all();

        return response()->json($statistics);
    }
}
