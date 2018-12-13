<?php

namespace App\Http\Controllers;

use App\Carrer;
use App\NoAssistance;
use App\Profesor;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public $profesorID = 0;
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
            ->with('no_assistances', $this->getTotalInassistances())
            ->with('assistances', $this->getTotalAssistances())
            ->with('profesorWithMoreInassistance', $this->getProfesorWithMoreInassistance())
            ->with('fault', $this->getFaultsProfesor())
            ->with('assistence', $this->getAssistencesProfesor())
            ->with('total', $this->getTotalRowsProfesor())
            ->with('carrer', $this->getCarrer());

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

        return  $this->checkInnasistances($profesorsWithMoreInassistances);
    }

    public function checkInnasistances($profesorsWithMoreInassistances){

        $id = $profesorsWithMoreInassistances[0]->profesor_id;
        $idaux = $id;
        $contador = 0;
        $contadorfinal = 0;

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

        return $this->getProfesorById($profesor);
    }

    public function getProfesorById($profesor){
        $profesor = Profesor::where('id', $profesor)->get();

        return $profesor;
    }

    public function getFaultsProfesor(){
        $profesor = $this->getProfesorWithMoreInassistance();

        $matchThese = ['profesor_id' => $profesor[0]->id, 'assistance' => false];

        $faults = NoAssistance::select('assistance')
            ->where($matchThese)
            ->count();

        return $faults;
    }

    public function getAssistencesProfesor(){
        $profesor = $this->getProfesorWithMoreInassistance();

        $matchThese = ['profesor_id' => $profesor[0]->id, 'assistance' => true];

        $assistences = NoAssistance::select('assistance')
            ->where($matchThese)
            ->count();

        return $assistences;
    }

    public function getTotalRowsProfesor(){
        $profesor = $this->getProfesorWithMoreInassistance();

        $matchThese = ['profesor_id' => $profesor[0]->id];

        $rows = NoAssistance::select('assistance')
            ->where($matchThese)
            ->count();

        return $rows;
    }

    private function getCarrer()
    {
        $profesor = $this->getProfesorWithMoreInassistance();

        $carrer = Carrer::select('name')
            ->where('id',  $profesor[0]->carrer_id)
            ->get();

        return $carrer[0]->name;
    }

}











