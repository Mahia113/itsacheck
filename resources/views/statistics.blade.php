@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            @include('layouts.aside')

            <div class="col-md-9">

                <div class="row">
                    <div class="col-md-4">
                        <div class="card padding-card">

                            <h5>Faltas totales del dia de hoy</h5>

                            <h1 class="text-center">{{$faults}} / {{$totalRowsInNoAssistance}}</h1>

                            <h6><b>{{$faults}}</b> faltas de <b>{{$totalRowsInNoAssistance}}</b> asistencias</h6>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card padding-card">

                            <h5>Profesores faltantes</h5>

                            <h1 class="text-center">{{$totalProfesorsWithFaults}} / {{$totalProfesors}}</h1>

                            <h6><b>{{$totalProfesorsWithFaults}}</b> profesores de <b>{{$totalProfesors}}</b> tienen faltas</h6>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card padding-card">

                            <h5>Grupos con faltas</h5>

                            <h1 class="text-center">{{$totalGroupsWithFaults}} / {{$totalGroups}}</h1>

                            <h6><b>{{$totalGroupsWithFaults}}</b> grupos de <b>{{$totalGroups}}</b> no tuvieron clase</h6>

                        </div>
                    </div>
                </div>

                <div class="row margin-top-card">

                    <div class="col-md-12">
                        <div class="card padding-card">

                            <div class="row">

                                <div class="col-md-8">

                                    <canvas id="myChart">{{$faultsOfCarrers[5]}}</canvas>

                                </div>

                                <div class="col-md-4">

                                    <h6 class="margin-bottom-10px"><b>{{$carrerWithMoreFaults[0]}}</b> es la carrea con más faltas con {{$carrerWithMoreFaults[1]}}.</h6>

                                    <h6 class="margin-bottom-10px">Los días con mas faltas son los <b>lunes</b>.</h6>

                                    <h6 class="margin-bottom-13px">
                                        Profesor con más faltas:
                                        <b>{{$profesorWithMoreFaultsByCarrer[0]->first_name}}
                                            {{$profesorWithMoreFaultsByCarrer[0]->last_name}}
                                            {{$profesorWithMoreFaultsByCarrer[0]->last_name2}}</b>.
                                    </h6>

                                    <button type="button" class="btn btn-outline-primary btn-block">GENERAR REPORTE</button>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>

                <div class="row margin-top-card">

                    <div class="col-md-6">
                        <div class="card padding-card">

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card padding-card">

                            <h5>Estadístca general</h5>

                            <div class="row margin-top-10px">

                                <div class="col-md-5">
                                    <h6>Grupos: <b>{{$totalGroups}}</b></h6>
                                    <h6>Profesores: <b>{{$totalProfesors}}</b></h6>
                                    <h6>Materias: <b>{{$totalSubjects}}</b></h6>
                                    <h6>Checadores: <b>{{$totalCheckers}}</b></h6>
                                </div>
                                <div class="col-md-7">
                                    <h6>El promedio de faltas del semestre es:</h6>

                                    <h2 class="text-center"><b>{{$percentageOfFaults}} %</b></h2>

                                    <h6 class="text-center"><b>4</b> faltas por día.</h6>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection