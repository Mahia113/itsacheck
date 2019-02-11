<?php

namespace App\Http\Controllers;

use App\Administrator;
use App\Carrer;
use App\Group;
use App\NoAssistance;
use App\Profesor;
use App\Schedule;
use App\Subject;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StatisticsController;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reports')
            ->with('carrers', $this->getCarrers())
            ->with('inassistances', (new HomeController())->getTotalInassistances())
            ->with('assistances', (new HomeController())->getTotalAssistances())
            ->with('profesorWithMoreInassistance', (new HomeController())->getProfesorWithMoreInassistance())
            ->with('carrer', (new HomeController())->getCarrer())
            ->with('assistence', (new HomeController())->getAssistencesProfesor())
            ->with('total', (new HomeController())->getTotalRowsProfesor())
            ->with('carrer_faults', (new StatisticsController())->getCarrerFaults())
            ->with('fault', (new HomeController())->getFaultsProfesor());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getCarrers(){
        $carrers = Carrer::select('id', 'name')->get();
        return $carrers;
    }

    public function getGroupById(Request $request){

        $var = $request->id;

        $groups = Group::select('id', 'number', 'letter')
            ->where('carrer_id', $var)
            ->get();

        return response()->json(['groups'=>$groups]);
    }

    public function getProfesorById(Request $request){
        $var = $request->id;

        $profesors = Profesor::select('id', 'first_name', 'last_name', 'last_name2')
            ->where('carrer_id', $var)
            ->get();

        return response()->json(['profesors'=>$profesors]);
    }

    public function generatePDFGeneral(Request $request){
        return response()->json(['profesors'=>"1212"]);
    }

    public function generatePDFCarrer(Request $request){
        $carrer_id = $request->carrer;

        return response()->json(['carrerData'=>$this->carrerData($carrer_id),
                                        'carrerRows' => $this->totalRowsByCarrer($carrer_id),
                                            'carrersFaults' => $this->totalFaultsByCarrer($carrer_id),
                                                'carrersAssistances' => $this->totalAssistancesByCarrer($carrer_id),
                                                    'schedulesFaults' => $this->schedulesFaultsData($carrer_id)]);
    }

    public function carrerData($carrer_id){
        $carrerInfo = Carrer::select('name', 'alias', 'key')
            ->where('id', $carrer_id)
            ->get();

        $groups = Group::where('carrer_id', $carrer_id)->count();

        $professors = Profesor::where('carrer_id', $carrer_id)->count();

        $turns = 2;

        $carrierData = array($carrerInfo, $groups, $professors, $turns);

        return $carrierData;
    }

    public function totalRowsByCarrer($carrer_id){

        $assistances = $this->totalAssistancesByCarrer($carrer_id);
        $faults = $this->totalFaultsByCarrer($carrer_id);

        return $assistances + $faults;
    }

    public function totalFaultsByCarrer($carrer_id){
        //Faults
        $subjectsWithFaults = NoAssistance::select('subject_id')
            ->where('assistance', false)
            ->get();

        foreach ($subjectsWithFaults as $subject => $valueFault){
            $subjectsIDsWithFaults[] = "$valueFault->subject_id";
        }

        $carrer_faults = Subject::select('id', 'name', 'carrer_id')
            ->where('carrer_id', $carrer_id)
            ->whereIn('id', $subjectsIDsWithFaults)
            ->count();

        return $carrer_faults;
    }

    public function totalAssistancesByCarrer($carrer_id){
        // Assistances
        $subjectsWithAssistances = NoAssistance::select('subject_id')
            ->where('assistance', true)
            ->get();

        foreach ($subjectsWithAssistances as $subject => $valueAssistance){
            $subjectsIDsWithAssistances[] = "$valueAssistance->subject_id";
        }

        $carrer_assitances = Subject::select('name', 'carrer_id')
            ->where('carrer_id', $carrer_id)
            ->whereIn('id', $subjectsIDsWithAssistances)
            ->count();

        return $carrer_assitances;
    }

    public function schedulesFaultsData($carrer_id){

        $subjectsWithFaults = NoAssistance::select('subject_id')
            ->where('assistance', false)
            ->get();

        foreach ($subjectsWithFaults as $subject => $valueFault){
            $subjectsIDsWithFaults[] = "$valueFault->subject_id";
        }

        $carrer_faults = Subject::select('id')
            ->where('carrer_id', $carrer_id)
            ->whereIn('id', $subjectsIDsWithFaults)
            ->get();

        foreach ($carrer_faults as $id => $valueid){
            $ids[] = $valueid->id;
        }

        $times = Schedule::select('time_start')
            ->whereIn('subject_id', $ids)
            ->get();

        $minusTen = 0;
        $majorTenMinusThirteen = 0;
        $majorThirteen = 0;

        foreach ($times as $time => $value_time){

            $currentTime = $value_time->time_start;

            $ten = date("10:00:00");
            $thirteen = date("13:00:00");

            switch ($currentTime){
                case ($currentTime <= $ten):
                    $minusTen = $minusTen +1;
                    break;

                case ($currentTime > $ten && $currentTime < $thirteen):
                    $majorTenMinusThirteen = $majorTenMinusThirteen+1;
                    break;

                case ($currentTime >= $thirteen):
                    $majorThirteen =$majorThirteen +1;
                    break;
            }
        }

        $timesCleaned = ['minusToTen'=> $minusTen, 'majorToTenAndMinusToThirteen' => $majorTenMinusThirteen, 'majorToThirteen' => $majorThirteen, 'timesTotal' => $times];

        return response()->json($timesCleaned);
    }

    public function generatePDFGroup(Request $request){

        $carrer_id = $request->carrier;
        $group_id = $request->group;

        return response()->json(['groupData'=>$this->groupData($group_id), 'groupFaults'=>$this->groupFaults($group_id),
                                    'groupAssistances'=>$this->groupAssistances($group_id), 'groupTotalRows'=>$this->groupTotalRows($group_id),
                                        'groupSchedulesFaultsData'=>$this->groupSchedulesFaultsData($group_id)]);
    }

    public function groupData($group_id){

        $group = Group::select('letter', 'number', 'carrer_id', 'turn_id')
            ->where('id', $group_id)
            ->get();

        $carrer = Carrer::select('name', 'alias', 'key')
            ->where('id', $group[0]->carrer_id)
            ->get();

        $groupData = ['number_group'=> $group[0]->number, 'letter'=> $group[0]->letter, 'turn'=> $group[0]->turn_id,
                        'carrer_name'=>$carrer[0]->name, 'carrer_alias'=>$carrer[0]->alias, 'carrer_key'=>$carrer[0]->key];

        return $groupData;
    }

    public function groupTotalRows($group_id){

        $group_assistances = $this->groupAssistances($group_id) + $this->groupFaults($group_id);

        return $group_assistances;
    }

    public function groupAssistances($group_id){
        $totalFaults = NoAssistance::select('subject_id')
            ->where('assistance', true)
            ->get();

        foreach ($totalFaults as $subject => $valueFault){
            $subjectsIDsWithFaults[] = "$valueFault->subject_id";
        }

        $group_assistances = Subject::select('id', 'name', 'carrer_id')
            ->where('group_id', $group_id)
            ->whereIn('id', $subjectsIDsWithFaults)
            ->count();

        return $group_assistances;
    }

    public function groupFaults($group_id){

        $totalFaults = NoAssistance::select('subject_id')
            ->where('assistance', false)
            ->get();

        foreach ($totalFaults as $subject => $valueFault){
            $subjectsIDsWithFaults[] = "$valueFault->subject_id";
        }

        $group_faults = Subject::select('id', 'name', 'carrer_id')
            ->where('group_id', $group_id)
            ->whereIn('id', $subjectsIDsWithFaults)
            ->count();

        return $group_faults;
    }

    public function groupSchedulesFaultsData($group_id){

        $subjectsWithFaults = NoAssistance::select('subject_id','assistance')
            ->where('assistance', false)
            ->get();

        foreach ($subjectsWithFaults as $subject => $valueFault){
            $subjectsIDsWithFaults[] = "$valueFault->subject_id";
        }

        /*$carrer_faults = Subject::select('id')
            ->where('group_id', $group_id)
            ->whereIn('id', $subjectsIDsWithFaults)
            ->get();

        foreach ($carrer_faults as $id => $valueid){
            $ids[] = $valueid->id;
        }

        $times = Schedule::select('time_start')
            ->whereIn('subject_id', $ids)
            ->get();*/

        /*$minusTen = 0;
        $majorTenMinusThirteen = 0;
        $majorThirteen = 0;

        foreach ($times as $time => $value_time){

            $currentTime = $value_time->time_start;

            $ten = date("10:00:00");
            $thirteen = date("13:00:00");

            switch ($currentTime){
                case ($currentTime <= $ten):
                    $minusTen = $minusTen +1;
                    break;

                case ($currentTime > $ten && $currentTime < $thirteen):
                    $majorTenMinusThirteen = $majorTenMinusThirteen+1;
                    break;

                case ($currentTime >= $thirteen):
                    $majorThirteen =$majorThirteen +1;
                    break;
            }
        }

        $timesCleaned = ['minusToTen'=> $minusTen, 'majorToTenAndMinusToThirteen' => $majorTenMinusThirteen, 'majorToThirteen' => $majorThirteen, 'timesTotal' => $times];*/

        return response()->json($subjectsWithFaults);
    }
}























