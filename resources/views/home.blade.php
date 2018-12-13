@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">

            @include('layouts.aside')

            <div class="col-md-8">

                <div class="row ">

                    <div class="col-md-6">
                        <div class="card padding-card">

                            <h5>Las estadisticas del día de hoy</h5>
                            <p>Fecha</p>

                            <h1 class="text-bold text-center">{{$no_assistances}} / {{$assistances}}</h1>

                            <p class="text-center">Faltas / Asistencias</p>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card padding-card">

                            <h5 class="margin-bottom-13px">Usuarios del sistema</h5>

                            <h6 class="margin-bottom-13px">#4 Directivos</h6>
                            <h6 class="margin-bottom-13px">#3 Checadores</h6>
                            <h6 class="margin-bottom-13px">#0 Cuentas solicitadas</h6>
                            <h6 class="margin-bottom-13px">#0 Correciones solicitadas</h6>

                        </div>
                    </div>

                </div>

                <div class="row margin-top-card">

                    <div class="col-md-12 white-text">
                        <div class="card padding-card degrado-rojo">

                            <div class="row">

                                <div class="col-md-7">

                                    <h5 class="">Profesor con más faltas hasta el momento</h5>

                                    <h4>
                                        {{ $profesorWithMoreInassistance[0]->first_name }} {{ $profesorWithMoreInassistance[0]->last_name }}
                                        {{ $profesorWithMoreInassistance[0]->last_name2 }}
                                    </h4>

                                    <h5>{{ $carrer }}</h5>

                                </div>

                                <div class="col-md-5 text-bold">
                                    
                                    <div class="row">

                                        <div class="col-md-4">
                                            Faltas:<br>{{ $fault }}
                                        </div>
                                        <div class="col-md-4">
                                            Asistencia:<br>{{ $assistence }}
                                        </div>
                                        <div class="col-md-4">
                                            Total:<br>{{ $total }}
                                        </div>
                                        
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
