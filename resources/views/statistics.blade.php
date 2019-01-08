@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">

            @include('layouts.aside')

            <div class="col-md-8">

                <div class="row">
                    <div class="col-md-4">
                        <div class="card padding-card">

                            faltas{{$faults}}
                            /
                            registros{{$totalRowsInNoAssistance}}

                            faltas / assistencias

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card padding-card">

                            {{$totalProfesorsWithFaults}}

                            /

                            {{$totalProfesors}}

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card padding-card">

                            {{$totalGroupsWithFaults}} / {{$totalGroups}}

                        </div>
                    </div>
                </div>

                <div class="row margin-top-card">

                    <div class="col-md-12">
                        <div class="card padding-card">

                            <div class="row">

                                <div class="col-md-8 blue">
                                    Grafica
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

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection