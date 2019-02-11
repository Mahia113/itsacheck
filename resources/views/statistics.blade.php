@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            @include('layouts.aside')

            <div class="col-md-9" id="capture">

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

                            <h6><b>{{$totalGroupsWithFaults}}</b> grupos de <b>{{$totalGroups}}</b> no tuvieron clas</h6>

                        </div>
                    </div>
                </div>

                <div class="row margin-top-card">

                    <div class="col-md-12">
                        <div class="card padding-card">

                            <div class="row">

                                <div class="col-md-8">

                                    <canvas id="statics_carrers"></canvas>

                                </div>

                                <div class="col-md-4">

                                    <h6 class="margin-bottom-10px margin-top-card"><b>{{$carrerWithMoreFaults[0]}}</b> es la carrea con más faltas con {{$carrerWithMoreFaults[1]}}.</h6>

                                    <h6 class="margin-bottom-10px">Los días con mas faltas son los <b>lunes</b>.</h6>

                                    <h6 class="margin-bottom-13px">
                                        Profesor con más faltas:
                                        <b>{{$profesorWithMoreFaultsByCarrer[0]->first_name}}
                                            {{$profesorWithMoreFaultsByCarrer[0]->last_name}}
                                            {{$profesorWithMoreFaultsByCarrer[0]->last_name2}}</b>.
                                    </h6>

                                    <button class="btn btn-outline-primary btn-block margin-top-85px" role="button" href="" target="_blank" onclick="myFunction()">
                                        GENERAR REPORTE
                                    </button>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>

                <div class="row margin-top-card">

                    <div class="col-md-6">
                        <div class="card padding-card">

                            <div class="row">

                                <div class="col-md-12">
                                    <h5>Faltas por genero</h5>
                                    <canvas id="statics_genders" style="height: 200px;"></canvas>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card padding-card">

                            <h5>Estadístca general</h5>

                            <div class="row margin-top-10px margin-bottom-50px">

                                <div class="col-md-5">
                                    <h6>Grupos: <b>{{$totalGroups}}</b></h6>
                                    <h6 class="margin-top-15px">Profesores: <b>{{$totalProfesors}}</b></h6>
                                    <h6 class="margin-top-15px">Materias: <b>{{$totalSubjects}}</b></h6>
                                    <h6 class="margin-top-15px">Checadores: <b>{{$totalCheckers}}</b></h6>
                                </div>
                                <div class="col-md-7">
                                    <h6>El promedio de faltas del semestre es:</h6>

                                    <h2 class="text-center margin-top-15px"><b>{{$percentageOfFaults}} %</b></h2>

                                    <h6 class="text-center margin-top-15px"><b>4</b> faltas por día.</h6>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>

        var ctxStaticsCarrers = document.getElementById('statics_carrers').getContext('2d');

        var ctxStaticsGenders = document.getElementById('statics_genders').getContext('2d');

        var myBarChart = new Chart(ctxStaticsCarrers, {
            type: 'bar',
            data: {
                labels: ["ISIC", "IINF", "IBQA", "ICIV", "IGEM", "IIAS", "IIND", "COP"],
                datasets: [{
                    label: "Faltas por carrera",
                    backgroundColor: ["rgba(255, 99, 132, 0.2)","rgba(201, 203, 207, 0.2)","rgba(255, 205, 86, 0.2)","rgba(75, 192, 192, 0.2)","rgba(54, 162, 235, 0.2)","rgba(153, 102, 255, 0.2)","rgba(152, 156, 164, 0.53)","rgba(255, 159, 64, 0.2)"],
                    borderColor:["rgb(255, 99, 132)","rgb(201, 203, 207)","rgb(255, 205, 86)","rgb(75, 192, 192)","rgb(54, 162, 235)","rgb(153, 102, 255)","rgb(201, 203, 207)", "rgb(255, 159, 64)"],
                    borderWidth:1,
                    data: ["{{$faultsOfCarrers[0]}}", "{{$faultsOfCarrers[1]}}", "{{$faultsOfCarrers[2]}}", "{{$faultsOfCarrers[3]}}", "{{$faultsOfCarrers[4]}}", "{{$faultsOfCarrers[5]}}", "{{$faultsOfCarrers[6]}}", "{{$faultsOfCarrers[7]}}"],
                }]
            },
            options: {}
        });

        var myDoughnutChart = new Chart(ctxStaticsGenders, {
            type: 'doughnut',
            data: {
                labels: ["Hombres","Mujeres"],
                datasets: [{
                    backgroundColor: ["rgb(54, 162, 235)","rgb(255, 99, 132)"],
                    data: ["57","43"]
                }]
            },
            options: {}
        });

        function myFunction() {
            html2canvas(document.querySelector("#capture")).then(canvas => {
                document.body.appendChild(canvas)
                var data = canvas.toDataURL();
                createPDF(data)
            });
        }

        function createPDF(data) {
            var docDefinition = {
                content: [{
                    image: data,
                    width: 700,
                }],
                pageOrientation: 'landscape',
                pageMargins: [ 100, 40, 60, 40 ]//left, top, right, bottom
            };

            pdfMake.createPdf(docDefinition).download("Estadisticas_reporte");

            setTimeout(function () {
                location.reload();
            }, 300);

        }

    </script>

@endsection
