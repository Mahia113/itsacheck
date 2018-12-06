<?php

namespace App\Http\Controllers;

use App\NoAssistance;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')
            ->with('no_assistance', $this->getTotalInassistances())
            ->with('assistance', $this->getTotalAssistances())
            ->with('profesorWithMoreInassistance', $this->getProfesorWithMoreInassistance());
    }

    public function getTotalInassistances(){
        $noAssistancesCount = NoAssistance::where('assistance', false)->count();
        return $noAssistancesCount;
    }

    public function getTotalAssistances(){
        $assistancesCount = NoAssistance::where('assistance', true)->count();
        return $assistancesCount;
    }

    public function getProfesorWithMoreInassistance(){

        $profesorWithMoreInassistance = NoAssistance::withCount('profesors')            // Count the errors
        ->orderBy('errors_count', 'desc')   // Order by the error count
        ->take(5)                           // Take the first 5
        ->get();

        return $profesorWithMoreInassistance;
    }
}
