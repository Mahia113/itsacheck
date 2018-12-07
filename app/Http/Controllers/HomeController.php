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

        $profesorsWithMoreInassistances = NoAssistance::select('profesor_id')
            ->where('assistance', false)
            ->orderby('profesor_id')
            ->get();

        //return $profesorsWithMoreInassistances;

        return  $this->checkInnasistances($profesorsWithMoreInassistances);
    }

    public function checkInnasistances($profesorsWithMoreInassistances){

        $id = $profesorsWithMoreInassistances[0]->profesor_id;
        $idaux = $id;
        $contador = 0;
        $contadorfinal = 0;
        $profesor = 0;

        foreach ($profesorsWithMoreInassistances as $valor) {
            //echo $valor->profesor_id;

            if($idaux == $valor->profesor_id){

                $contador += 1;
                $profesor = $valor->profesor_id;

                if($contador > $contadorfinal){
                    $profesor = $valor->profesor_id;
                }

            }

            $idaux = $id;
            $id =  $valor->profesor_id;

            if($idaux != $valor->profesor_id){
                $contadorfinal  = $contador;
                $contador = 0;
            }
        }

        echo $profesor;

        $this->getProfesorById($profesor);

    }

    public function getProfesorById($profesor){
        
    }
}
