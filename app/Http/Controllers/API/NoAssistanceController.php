<?php

namespace App\Http\Controllers\API;

use App\Carrer;
use App\Group;
use App\Profesor;
use App\Schedule;
use App\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\NoAssistance;

class NoAssistanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return NoAssistance::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $no_assistance = NoAssistance::create($request->all());
        return response()->json($no_assistance, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($no_assistance)
    {
        return NoAssistance::find($no_assistance);
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

    public function bySubject($subject)
    {
        $subjects = NoAssistance::all();

        $filtered = $subjects->where('subject_id', $subject);

        return response()->json($filtered, 200);
    }

    public function byProfesor($profesor)
    {
        $profesors = NoAssistance::all();

        $filtered = $profesors->where('profesor_id', $profesor);

        return response()->json($filtered, 200);
    }

    public function byCarrier($profesor)
    {
        //$profesors = NoAssistance::all();

        //$filtered = $profesors->where('profesor_id', $profesor);

        //return response()->json($filtered, 200);
    }

    public function byUserAll($administrator){
        $no_assistances = NoAssistance::select('assistance', 'time_registered', 'schedule_id', 'subject_id', 'profesor_id', 'administrator_id')
            ->where('administrator_id', $administrator)
            ->get();

        return response()->json($no_assistances, 200);
    }

    public function byUserDivided($day, $administrator, $date){
        $checked = NoAssistance::select('assistance', 'schedule_id', 'subject_id', 'profesor_id', 'administrator_id')
            ->where([['administrator_id', $administrator], ['date_registered', $date]])
            ->count();

        $total = Schedule::select()
        ->where([['day', $day], ['administrator_id', $administrator]])
        ->count();

        $no_checked = $total - $checked;

        return response()->json(['total'=>round($total), 'checked'=>$checked, 'no_checked'=>$no_checked], 200);
    }

    public function schedules($time_registered, $administrator_id, $day){

        $idsArray = [];
        $schedulesData = [];

        $registered = NoAssistance::select('schedule_id')
            ->where([['administrator_id', $administrator_id], ['date_registered', $time_registered]])
            ->get();

        foreach($registered as $register => $value){
            $subject_id = $value->schedule_id;
            $idsArray[] = $subject_id;
        }

        $schedules = Schedule::select()
            ->where([['administrator_id', $administrator_id], ['day', $day]])
            ->whereNotIn('id', $idsArray)
            ->get();

        foreach ($schedules as $schedule => $value){
                $id = $value->id;

                $schedulesInformation = Subject::select()
                ->where('id', $id)
                ->get();

                foreach ($schedulesInformation as $scheduleInformation => $value2){

                    $professor = Profesor::select('first_name', 'last_name', 'last_name2')
                        ->where('id', $value2->profesor_id)
                        ->get();

                    $carrier = Carrer::select()
                        ->where('id', $value2->carrer_id)
                        ->get();

                    $carrierName = $carrier[0]->name;
                    $nameProfessor = $professor[0]->first_name." ".$professor[0]->last_name." ".$professor[0]->last_name2;

                    $scheduleData = ["schedule_id"=>$value->id, "time_start"=>$value->time_start, "time_end"=>$value->time_end, "day"=>$value->day,
                                         "subject_id"=>$value2->id, "subject_name"=>$value2->name, "subject_key"=>$value2->key, "subject_carrier_id"=>$value2->carrer_id,
                                            "subject_carrier_name"=>$carrierName, "subject_professor_id"=>$value2->profesor_id, "subject_professor_name"=>$nameProfessor];

                    $schedulesData [] = $scheduleData;
                }
        }

        return response()->json(["schedules"=>$schedulesData] ,200);
    }

    public function destroy($id)
    {
        //
    }

    public function byDay($day){

        $registros = NoAssistance::select()
            ->where('date_registered', $day)
            ->count();

        $faults = NoAssistance::select()
            ->where('date_registered', $day)
            ->count();

        $assistances = $registros - $faults;

        return response()->json(['totalDeRegistros'=>$registros, 'asistencias'=>$assistances, 'faltas'=>$registros], 200);
    }

    public function generalReport(){
        $registros = NoAssistance::select()
            ->count();

        $faults = NoAssistance::select()
            ->where('assistance', false)
            ->count();

        $assistances = $registros - $faults;

        return response()->json(['totalDeRegistros'=>$registros, 'asistencias'=>$assistances, 'faltas'=>$faults], 200);

    }

    public function carrierReport(){

        $carriers = Carrer::select('id')
            ->get();

        foreach($carriers as $carrier => $value){
            $carrier_id = $value->id;
            $carrerasData[] = ['carrierData'=>$this->carrierData($carrier_id),
                'carrierRows' => $this->totalRowsByCarrier($carrier_id),
                'carriersFaults' => $this->totalFaultsByCarrier($carrier_id),
                'carriersAssistances' => $this->totalAssistancesByCarrier($carrier_id)];
        }

        return response()->json($carrerasData, 200);
    }

    public function carrierData($carrier_id){
        $carrerInfo = Carrer::select('name', 'alias', 'key')
            ->where('id', $carrier_id)
            ->get();

        $groups = Group::where('carrer_id', $carrier_id)->count();

        $professors = Profesor::where('carrer_id', $carrier_id)->count();

        $turns = 2;

        $carrierData = array("info"=>$carrerInfo,"Grupos" =>$groups, "Profesores"=>$professors, "Turnos"=>$turns);

        return $carrierData;
    }

    public function totalRowsByCarrier($carrier_id){

        $assistances = $this->totalAssistancesByCarrier($carrier_id);
        $faults = $this->totalFaultsByCarrier($carrier_id);

        return $assistances + $faults;
    }

    public function totalFaultsByCarrier($carrier_id){
        //Faults
        $subjectsWithFaults = NoAssistance::select('subject_id')
            ->where('assistance', false)
            ->get();

        foreach ($subjectsWithFaults as $subject => $valueFault){
            $subjectsIDsWithFaults[] = "$valueFault->subject_id";
        }

        $carrer_faults = Subject::select('id', 'name', 'carrer_id')
            ->where('carrer_id', $carrier_id)
            ->whereIn('id', $subjectsIDsWithFaults)
            ->count();

        return $carrer_faults;
    }

    public function totalAssistancesByCarrier($carrier_id){
        // Assistances
        $subjectsWithAssistances = NoAssistance::select('subject_id')
            ->where('assistance', true)
            ->get();

        foreach ($subjectsWithAssistances as $subject => $valueAssistance){
            $subjectsIDsWithAssistances[] = "$valueAssistance->subject_id";
        }

        $carrer_assitances = Subject::select('name', 'carrer_id')
            ->where('carrer_id', $carrier_id)
            ->whereIn('id', $subjectsIDsWithAssistances)
            ->count();

        return $carrer_assitances;
    }

}