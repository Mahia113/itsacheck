<?php

namespace App\Http\Controllers;

use App\Carrer;
use App\Group;
use App\NoAssistance;
use App\Profesor;
use App\Subject;
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
            ->with('totalProfesors', $this->getTotalProfesors())
            ->with('totalGroupsWithFaults', $this->getTotalGroupsWithFaults())
            ->with('totalGroups', $this->getTotalGroups())
            ->with('carrerWithMoreFaults', $this->getCarrerWithMoreFaults())
            ->with('profesorWithMoreFaultsByCarrer', $this->getProfesorWithMoreFaultsByCarrer());
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
        return Profesor::all()->count();
    }

    public function getTotalGroupsWithFaults(){
        $subjects = NoAssistance::select('subject_id')
            ->where('assistance', false)
            ->groupBy('subject_id')
            ->get();

        return $this->getGroups($subjects);
    }

    public function getGroups($subjects){

        $total = 0;
        $group = null;

        foreach ($subjects as $subject){

            $total += $group = Group::select('id')
                ->where('id', $subject->subject_id)
                ->groupBy('id')
                ->count();
        }

        return $total;
    }

    public function getTotalGroups(){
        return Group::all()->count();
    }

    public function getCarrerWithMoreFaults(){

        $ISIC = 0; $IINF = 0; $IBQA = 0; $ICIV = 0; $IGEM = 0; $IIAS = 0; $IIND = 0; $COP = 0;

        $subjects = NoAssistance::select('subject_id')
            ->where('assistance', false)
            ->get();

        foreach ($subjects as $subject => $value){
                $subjectsIDs[] = "$value->subject_id";
        }

        $carrers = Subject::select('carrer_id')
            ->whereIn('id', $subjectsIDs)
            ->get();

        foreach ($carrers as $carrer){

            switch($carrer->carrer_id){
                case 1:
                    $ISIC += 1;
                    break;
                case 2:
                    $IINF += 1;
                    break;
                case 3:
                    $IBQA += 1;
                    break;
                case 4:
                    $ICIV += 1;
                    break;
                case 5:
                    $IGEM += 1;
                    break;
                case 6:
                    $IIAS += 1;
                    break;
                case 7:
                    $IIND += 1;
                    break;
                case 8:
                    $COP += 1;
                    break;
            }
        }

        $carrersArrayValues = array($ISIC, $IINF, $IBQA, $ICIV, $IGEM, $IIAS, $IIND, $COP);

        $maxValue = max($carrersArrayValues);

        $length = count($carrersArrayValues);

        for ($i = 0; $i<$length; $i++){
            if($maxValue == $carrersArrayValues[$i]){
                $maxValuePosition = $i+1;
            }
        }

        $carrer = Carrer::select('alias')
            ->where('id', $maxValuePosition)
            ->get();

        $data = array($carrer[0]->alias, $maxValue, $maxValuePosition);

        return $data;
    }

    public function getProfesorWithMoreFaultsByCarrer(){

        $carrerId = $this->getCarrerWithMoreFaults();

        $profesors = Subject::select('profesor_id')
            ->where('carrer_id', $carrerId[2])
            ->get();

        $profesor = Profesor::select()
            ->where('id', $profesors[0]->profesor_id)
            ->get();

        return $profesor;
    }
}
