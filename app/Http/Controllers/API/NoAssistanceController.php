<?php

namespace App\Http\Controllers\API;

use App\Schedule;
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

    public function byCarrer($profesor)
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
}
