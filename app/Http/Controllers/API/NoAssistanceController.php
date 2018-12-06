<?php

namespace App\Http\Controllers\API;

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
}
