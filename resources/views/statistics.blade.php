@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">

            @include('layouts.aside')

            <div class="col-md-8">

                <div class="row blue">
                    <div class="col-md-4">
                        <div class="card padding-card">

                            faltas{{$faults}}
                            /
                            registros{{$totalRowsInNoAssistance}}

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

                        </div>
                    </div>
                </div>

                <div class="row margin-top-card red">

                    <div class="col-md-12">
                        <div class="card padding-card">

                        </div>
                    </div>

                </div>
                
                <div class="row margin-top-card blue">

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