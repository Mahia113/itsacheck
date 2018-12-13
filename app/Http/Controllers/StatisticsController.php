<?php

namespace App\Http\Controllers;

use App\NoAssistance;
use App\Profesor;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        return view('statistics')
            ->with('faults', $this->getTotalFaults())
            ->with('totalRowsInNoAssistance', $this->getTotalRowsInNoAssistance())
            ->with('totalProfesorsWithFaults', $this->getTotalProfesorsWithFaults())
            ->with('totalProfesors', $this->getTotalProfesors());
    }

    public function getTotalFaults(){
        return NoAssistance::select('assistance')
            ->where('assistance', false)
            ->count();
    }

    public function getTotalRowsInNoAssistance(){
        return NoAssistance::select('assistance')->count();
    }

    public function getTotalProfesorsWithFaults(){
        $profesors = NoAssistance::select('profesor_id')->where('assistance', false)
            ->groupBy('profesor_id')
            ->get();

        $total = 0;

        foreach ($profesors as $profesor){
            $total += 1;
        }

        return $total;
    }

    public function getTotalProfesors(){
        return Profesor::all()
            ->count();
    }

}
