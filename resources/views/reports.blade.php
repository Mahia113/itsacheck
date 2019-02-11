@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">

            @include('layouts.aside')

            <div class="col-md-9" id="capture">

                <div class="row">

                    <div class="col-md-12">
                        <div class="card padding-card">

                            <div class="row align-items-end">

                                <div class="col-md-6">

                                    <h5>Reportes</h5>

                                    <h6>Generar reporte general</h6>

                                    <select name="period" id="period1" class="custom-select margin-top-10px" required>
                                        <option selected value="99">Selecciona un período</option>
                                        <option value="100">Actual</option>
                                    </select>

                                </div>

                                <div class="col-md-4 offset-2">
                                    <button type="submit" class="btn btn-primary btn-block" id="buttonReportGeneral">Generar reporte</button>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

                <div class="row margin-top-card">

                    <div class="col-md-12">
                        <div class="card padding-card">

                            <div class="row align-items-end">

                                <div class="col-md-8">

                                    <h6>Generar reporte de una carrera</h6>

                                    <div class="row margin-top-15px">
                                        <div class="col-md-6">
                                            <select class="custom-select" id="carrier1">
                                                <option value="99" selected>Selecciona una carrera</option>
                                                @for ($i = 0; $i < (sizeof($carrers)); $i++)
                                                    <option value="{{$carrers[$i]->id}}">{{$carrers[$i]->name}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="custom-select" id="period2">
                                                <option value="99" selected>Selecciona un período</option>
                                                <option value="100">Actual</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <button id="buttonReportByCarrer" type="button" class="btn btn-primary btn-block">Generar reporte</button>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

                <div class="row margin-top-card">

                    <div class="col-md-12">
                        <div class="card padding-card">

                            <div class="row align-items-end">

                                <div class="col-md-8">

                                    <h6>Generar reporte de un grupo</h6>

                                    <div class="row margin-top-15px">
                                        <div class="col-md-6">
                                            <select class="custom-select" id="carrier2">
                                                <option selected value="99">Selecciona una carrera</option>
                                                @for ($i = 0; $i < (sizeof($carrers)); $i++)
                                                    <option value="{{$carrers[$i]->id}}">{{$carrers[$i]->name}}</option>
                                                @endfor
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <select class="custom-select" id="group">
                                                <option selected value="99">Selecciona un grupo</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 margin-top-15px">
                                            <select class="custom-select" id="period3">
                                                <option selected value="99">Selecciona un período</option>
                                                <option value="100">Actual</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <button id="buttonReportByGroup" type="button" class="btn btn-primary btn-block">Generar reporte</button>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

                <div class="row margin-top-card">

                    <div class="col-md-12">
                        <div class="card padding-card">

                            <div class="row align-items-end">

                                <div class="col-md-8">

                                    <h6>Generar reporte de un profesor</h6>

                                    <div class="row margin-top-15px">
                                        <div class="col-md-6">
                                            <select class="custom-select" id="carrier3">
                                                <option selected>Selecciona una carrera</option>
                                                @for ($i = 0; $i < (sizeof($carrers)); $i++)
                                                    <option value="{{$carrers[$i]->id}}">{{$carrers[$i]->name}}</option>
                                                @endfor
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <select class="custom-select" id="profesor1">
                                                <option selected>Selecciona un profesor</option>
                                                <option value="1">Actual</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 margin-top-15px">
                                            <select class="custom-select">
                                                <option selected>Selecciona un período</option>
                                                <option value="1">Actual</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <button type="button" class="btn btn-primary btn-block">Generar reporte</button>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <div id="container1" style="width: 890px; display: none;">
        <div id="layout_general" class="container">

            <div class="row align-items-center">
                <div class="col-md-2 align-self-center">
                    <img src="/img/logo_itsa.png" alt="logo" class="img-fluid" width="100px" height="100px">
                </div>
                <div class="col-md-8">
                    <h3 class="text-center">Instituto Tecnológico Superior de Apatzingán</h3>
                </div>
                <div class="col-md-2">
                    <div class="text-right">
                        <img src="/img/logo_itsa.png" alt="logo" class="img-fluid" width="100px" height="100px">
                    </div>
                </div>
            </div>

            <div class="row margin-top-card">
                <div class="col-md-4 offset-1">
                    <h6>Reporte general</h6>
                </div>
                <div class="col-md-5 offset-1">
                    <div class="text-right">
                        <h6 id="cabeza_fecha" class="">Apatzingán, Mich. a 17 de Enero 2019</h6>
                    </div>
                </div>
            </div>

            <div class="row margin-top-40px">

                <div class="col-md-10 offset-1">
                    <p><b>Las estadisticas generales de la plataforma son la siguientes</b></p>
                </div>

                <div class="col-md-5 offset-1">

                    <h5>Las estadisticas del semestre</h5>

                    <h1 class="text-bold text-center">{{$inassistances}} / {{$assistances}}</h1>

                    <p class="text-center">Faltas / Asistencias</p>

                </div>
                <div class="col-md-5 offset-1">
                    <h5 class="margin-bottom-13px">Usuarios del sistema</h5>

                    <h6 class="margin-bottom-13px">#4 Directivos</h6>
                    <h6 class="margin-bottom-13px">#3 Checadores</h6>
                    <h6 class="margin-bottom-13px">#0 Cuentas solicitadas</h6>
                    <h6 class="margin-bottom-13px">#0 Correciones solicitadas</h6>
                </div>

            </div>

            <div class="row white-text margin-top-15px">

                <div class="col-md-10 offset-1 degrado-rojo padding-card card">

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

                                <div class="col-md-4 text-center">
                                    Faltas<br>{{ $fault }}
                                </div>
                                <div class="col-md-5 text-center">
                                    Asistencia<br>{{ $assistence }}
                                </div>
                                <div class="col-md-3 text-center">
                                    Total<br>{{ $total }}
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="row margin-top-card">

                <div class="col-md-10 offset-1 margin-top-10px">
                    <h5>Faltas por carrera</h5>
                    <canvas id="statics_carrers" style="height: 1000px;"></canvas>
                </div>

            </div>

        </div>
    </div>

    <div id="container2" style="width: 890px; display: none;">
        <div id="layout_general" class="container">

            <div class="row align-items-center">
                <div class="col-md-2 align-self-center">
                    <img src="/img/logo_itsa.png" alt="logo" class="img-fluid" width="100px" height="100px">
                </div>
                <div class="col-md-8">
                    <h3 class="text-center">Instituto Tecnológico Superior de Apatzingán</h3>
                </div>
                <div class="col-md-2">
                    <div class="text-right">
                        <img src="/img/logo_itsa.png" alt="logo" class="img-fluid" width="100px" height="100px">
                    </div>
                </div>
            </div>

            <div class="row margin-top-card">
                <div class="col-md-4 offset-1">
                    <h6>Reporte de una carrera</h6>
                </div>
                <div class="col-md-5 offset-1">
                    <div class="text-right">
                        <h6 id="cabeza_fecha2" class="">Apatzingán, Mich. a 20 de Febrero 2019</h6>
                    </div>
                </div>
            </div>

            <div class="row margin-top-card">
                <div id="" class="col-md-10 offset-1">Datos generales de la carrera</div>

                <div class="col-md-6 offset-1">
                    <div class="row margin-top-card">
                        <div id="cont1-carrer" class="col-md-12">Carrera: </div>
                        <div id="cont1-alias" class="col-md-12">Alias: </div>
                        <div id="cont1-key" class="col-md-12">Clave:</div>
                    </div>
                </div>

                <div class="col-md-4 offset-1">
                    <div class="row margin-top-card">
                        <div id="cont1-groups" class="col-md-12">Grupos: #30</div>
                        <div id="cont1-professors" class="col-md-12">Profesores: #50</div>
                        <div id="cont1-turns" class="col-md-12">Turnos: #2</div>
                    </div>
                </div>

            </div>

            <div class="row margin-top-card">

                <div class="col-md-10 offset-1 margin-top-10px">
                    <h5>Estadisticas generales de la carrera</h5>
                    <canvas id="static_carrer_donut" style="height: 700px;"></canvas>
                </div>

            </div>

            <div class="row margin-top-card">

                <div class="col-md-10 offset-1 margin-top-10px">
                    <h5>Horarios mas frecuentes</h5>
                    <canvas id="static_carrer_line" style="height: 700px;"></canvas>
                </div>

            </div>


        </div>
    </div>

    <div id="container3" style="width: 890px; display: block;">
        <div id="layout_general" class="container">

            <div class="row align-items-center">
                <div class="col-md-2 align-self-center">
                    <img src="/img/logo_itsa.png" alt="logo" class="img-fluid" width="100px" height="100px">
                </div>
                <div class="col-md-8">
                    <h3 class="text-center">Instituto Tecnológico Superior de Apatzingán</h3>
                </div>
                <div class="col-md-2">
                    <div class="text-right">
                        <img src="/img/logo_itsa.png" alt="logo" class="img-fluid" width="100px" height="100px">
                    </div>
                </div>
            </div>

            <div class="row margin-top-card">
                <div class="col-md-4 offset-1">
                    <h6>Reporte de un grupo</h6>
                </div>
                <div class="col-md-5 offset-1">
                    <div class="text-right">
                        <h6 id="cabeza_fecha2" class="">Apatzingán, Mich. a 20 de Febrero 2019</h6>
                    </div>
                </div>
            </div>

            <div class="row margin-top-card">
                <div id="" class="col-md-10 offset-1">Datos generales del grupo</div>

                <div class="col-md-6 offset-1">
                    <div class="row margin-top-card">
                        <div id="cont3-carrer" class="col-md-12">Carrera: </div>
                        <div id="cont3-alias" class="col-md-12">Alias: </div>
                        <div id="cont3-key" class="col-md-12">Clave:</div>
                    </div>
                </div>

                <div class="col-md-4 offset-1">
                    <div class="row margin-top-card">
                        <div id="cont3-group" class="col-md-12">Grupo: 101</div>
                        <div id="cont3-letter" class="col-md-12">Letra: A</div>
                        <div id="cont3-turn" class="col-md-12">Turno: Matutino</div>
                    </div>
                </div>

            </div>

            <div class="row margin-top-card">

                <div class="col-md-10 offset-1 margin-top-10px">
                    <h5>Estadisticas generales de un grupo</h5>
                    <canvas id="static_group_donut" style="height: 700px;"></canvas>
                </div>

            </div>

            <div class="row margin-top-card">

                <div class="col-md-10 offset-1 margin-top-10px">
                    <h5>Horarios mas frecuentes</h5>
                    <canvas id="static_carrer_line" style="height: 700px;"></canvas>
                </div>

            </div>

        </div>
    </div>

    <script>
        //Invoke functions
        logicToSelects();

        generalConfigPDF();

        generalReport();

        byCarrierReport();

        byGroupReport();


        //Initial Functions
        function logicToSelects(){
            $('#carrier2').on('change', function(e) {
                var carrer_id = e.target.value;

                $("#group").empty();
                $("#group").append(`<option selected value="0">Selecciona un grupo</option>`);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type:'POST',
                    url:'/reports/group',
                    data:{id:carrer_id},

                    success:function(data){
                        //console.log(data.groups);
                        data.groups.forEach(group =>
                            $('#group').append(`<option value="${group.id}">${group.number+' '+group.letter}</option>`)
                        )
                    },
                    error:function (xhr, ajaxOptions, thrownError) {
                        console.log(xhr.status);
                        console.log(thrownError);
                    }

                });

            });
            $('#carrier3').on('change', function(e) {
                var carrer_id = e.target.value;

                $("#profesor1").empty();
                $("#profesor1").append(`<option selected value="0">Selecciona un profesor</option>`);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type:'POST',
                    url:'/reports/profesor',
                    data:{id:carrer_id},

                    success:function(data){
                        //console.log(data.profesors);
                        data.profesors.forEach(profesor =>
                            $('#profesor1').append(`<option value="${profesor.id}">${profesor.first_name+' '+profesor.last_name+' '+profesor.last_name2}</option>`)
                        )
                    }

                });

            });
        }

        function generalConfigPDF() {
            var d = new Date();
            var months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
            document.getElementById("cabeza_fecha").innerHTML = "Apatzingán, Mich. a "+d.getDate()+" de "+months[d.getMonth()]+" del "+d.getFullYear();
            document.getElementById("cabeza_fecha2").innerHTML = "Apatzingán, Mich. a "+d.getDate()+" de "+months[d.getMonth()]+" del "+d.getFullYear();

        }


        //General functions
        function showContainer(container, name_pdf) {
            var doc = document.querySelector(container);
            doc.style.display = 'block';
            setTimeout(function () {
                getHTML(container, name_pdf);
            }, 600);
        }

        function getHTML(container, name_pdf) {
            html2canvas(document.querySelector(container), {

                onclone: function (doc) {
                    var childNodesHTML = doc.childNodes[1];
                    var childNodesBODY = childNodesHTML.childNodes[2];
                    var childNodesAPP = childNodesBODY.childNodes[2];
                    var childNodesMAIN = childNodesAPP.childNodes[1];
                    var childNodesCOINTAINER1 = childNodesMAIN.childNodes[3];

                    console.dir(childNodesHTML);
                    console.dir(childNodesBODY);
                    console.dir(childNodesAPP);
                    console.dir(childNodesMAIN);
                    console.dir(childNodesCOINTAINER1);

                    //childNodesCOINTAINER1.style.display = 'block';
                }
            }).then(canvas => {

                var doc = document.querySelector(container);

                doc.style.display = 'none';
                //document.body.appendChild(canvas);
                var data = canvas.toDataURL();
                createGeneralPDF(data, name_pdf)
            });
        }

        function createGeneralPDF(data, name_pdf) {
            var docDefinition = {
                content: [{
                    image: data,
                    width: 550,
                }],
                pageOrientation: 'portrait',
                pageMargins: [20, 40, 20, 40]//left, top, right, bottom
            };
            pdfMake.createPdf(docDefinition).download(name_pdf + "_" + Date.now());
        }


        //Reports
        function generalReport() {
            //render canvas
            var ctxStaticsCarrers = document.getElementById('statics_carrers').getContext('2d');
            var myDoughnutChart = new Chart(ctxStaticsCarrers, {
                type: 'doughnut',
                data: {
                    labels: ["ISIC - #"+'{{$carrer_faults[0]}}', "IINF - #"+'{{$carrer_faults[1]}}', "IBQA - #"+'{{$carrer_faults[2]}}', "ICIV - #"+'{{$carrer_faults[3]}}', "IGEM - #"+'{{$carrer_faults[4]}}', "IIAS - #"+'{{$carrer_faults[5]}}', "IIND - #"+'{{$carrer_faults[6]}}', "COP - #"+'{{$carrer_faults[7]}}'],
                    datasets: [{
                        backgroundColor: ["rgb(255, 99, 132)","rgb(165,92,27)","rgb(255, 205, 86)","rgb(75, 192, 192)","rgb(54, 162, 235)","rgb(153, 102, 255)","rgb(201, 203, 207)", "rgb(255, 159, 64)"],
                        data: [{{$carrer_faults[0]}},{{$carrer_faults[1]}}, {{$carrer_faults[2]}}, {{$carrer_faults[3]}}, {{$carrer_faults[4]}}, {{$carrer_faults[5]}}, {{$carrer_faults[6]}}, {{$carrer_faults[7]}}]
                    }]
                },
                options: {
                    animation: {
                        onComplete: function() {
                            isChartRendered = false
                        }
                    }
                }
            });

            $(document).on('click', "#buttonReportGeneral", function(){

                var e = document.getElementById("period1");
                var periodSelected = e.options[e.selectedIndex].value;

                if(periodSelected  != 99){

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type:'POST',
                        url:'/reports/pdf/general',
                        data:{period:periodSelected},
                        success:function(data){
                            showContainer("#container1", "reporte_general");
                        }
                    });
                }
            });
        }

        function byCarrierReport() {

            $(document).on('click', "#buttonReportByCarrer", function () {

                var e = document.getElementById("period2");
                var e2 = document.getElementById("carrier1");

                var periodSelected = e.options[e.selectedIndex].value;
                var carrerSelected = e2.options[e2.selectedIndex].value;

                if (periodSelected != 99 && carrerSelected != 99) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'POST',
                        url: '/reports/pdf/bycarrer',
                        data: {period: periodSelected, carrer: carrerSelected},
                        success: function (data) {
                            var dataClean = data.schedulesFaults.original;
                            console.log(data);
                            renderGraphicDonut(data);
                            renderGraphicLine(dataClean)
                            showContainer("#container2", "reporte_carrera_"+data.carrerData[0][0].alias)
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            console.log(xhr.status);
                            console.log(thrownError);
                        }
                    });
                }
            });

            function renderGraphicDonut(data) {
                //set data to general information
                document.getElementById("cont1-carrer").innerHTML = "<b>Carrera:</b> " + data.carrerData[0][0].name;
                document.getElementById("cont1-alias").innerHTML = "<b>Alias:</b> " + data.carrerData[0][0].alias;
                document.getElementById("cont1-key").innerHTML = "<b>Clave</b> " + data.carrerData[0][0].key;

                document.getElementById("cont1-groups").innerHTML = "<b>Grupos:</b> #" + data.carrerData[1];
                document.getElementById("cont1-professors").innerHTML = "<b>Profesores:</b> #" + data.carrerData[2];
                document.getElementById("cont1-turns").innerHTML = "<b>Turnos:</b> #" + data.carrerData[3];

                //procesing data
                let faults = Math.round((data.carrersFaults / data.carrerRows) * 100);
                let assistences = Math.round((data.carrersAssistances / data.carrerRows) * 100);

                //render canvas
                var ctxStaticsCarrersDonut = document.getElementById('static_carrer_donut').getContext('2d');
                var myDoughnutChart = new Chart(ctxStaticsCarrersDonut, {
                    type: 'doughnut',
                    data: {
                        labels: ["Asistencias " + assistences + "%", "Faltas " + faults + "%"],
                        datasets: [{
                            backgroundColor: ["rgb(53,144,243)", "rgb(240,84,79)"],
                            data: [data.carrersAssistances, data.carrersFaults]
                        }]
                    },
                    options: {
                        animation: {
                            onComplete: function () {
                                isChartRendered = false
                            }
                        }
                    }
                });
            }

            function renderGraphicLine(data) {

                var ctxStaticsCarrersLine = document.getElementById('static_carrer_line').getContext('2d');

                var myLineChart = new Chart(ctxStaticsCarrersLine, {
                    type: 'line',
                    data: {
                        labels: ["0 <","00:07 - 10:00", "10:00 - 13:00", "13:00 >"],
                        datasets: [{
                            label: 'Faltas',
                            backgroundColor: 'rgb(53,144,243)',
                            borderColor: 'rgb(53,144,243)',
                            data: [0, data.minusToTen, data.majorToTenAndMinusToThirteen, data.majorToThirteen, data.majorToThirteen - 1],
                            fill: false,
                        }]
                    },
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Gráfica que muestra la cantidad de faltas por rangos de horarios.'
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: false,
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Rangos de horas'
                                }
                            }],
                            yAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Horas'
                                }
                            }]
                        }
                    }
                });
            }
        }

        function byGroupReport(){
            $(document).on('click', "#buttonReportByGroup", function () {

                var e = document.getElementById("period3");
                var e2 = document.getElementById("carrier2");
                var e3 = document.getElementById("group");

                var periodSelected = e.options[e.selectedIndex].value;
                var carrierSelected = e2.options[e2.selectedIndex].value;
                var groupSelected = e3.options[e3.selectedIndex].value;

                if (periodSelected != 99 && carrierSelected != 99 && groupSelected != 99) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'POST',
                        url: '/reports/pdf/bygroup',
                        data: {period: periodSelected, carrier: carrierSelected, group:groupSelected},
                        success: function (data) {
                            console.log(data);

                            renderSubHeader(data.groupData);

                            renderGraphicDonut2(data);
                            //renderGraphicLine2(data);
                            //showContainer("#container3", "reporte_grupo_", );
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            console.log(xhr.status);
                            console.log(thrownError);
                        }
                    });
                }
            });

            function renderSubHeader(groupData){
                //set data to general information
                document.getElementById("cont3-carrer").innerHTML = "<b>Carrera:</b> " + groupData.carrer_name;
                document.getElementById("cont3-alias").innerHTML = "<b>Alias:</b> " + groupData.carrer_alias;
                document.getElementById("cont3-key").innerHTML = "<b>Clave:</b> " + groupData.carrer_key;

                document.getElementById("cont3-group").innerHTML = "<b>Grupo: </b>" + groupData.number_group;
                document.getElementById("cont3-letter").innerHTML = "<b>Letra: </b>" + groupData.letter;

                if(groupData.turn == 1){
                    document.getElementById("cont3-turn").innerHTML = "<b>Turno: </b>Matutino";
                }else{
                    document.getElementById("cont3-turn").innerHTML = "<b>Turno: </b>Vespertino";
                }
            }

            function renderGraphicDonut2(data) {
                //procesing data
                let faults = Math.round((data.groupFaults / data.groupTotalRows) * 100);
                let assistences = Math.round((data.groupAssistances / data.groupTotalRows) * 100);

                //render canvas
                var ctxStaticsGroupDonut = document.getElementById('static_group_donut').getContext('2d');
                var myDoughnutChart = new Chart(ctxStaticsGroupDonut, {
                    type: 'doughnut',
                    data: {
                        labels: ["Asistencias " + assistences + "%", "Faltas " + faults + "%"],
                        datasets: [{
                            backgroundColor: ["rgb(53,144,243)", "rgb(240,84,79)"],
                            data: [data.carrersAssistances, data.carrersFaults]
                        }]
                    },
                    options: {
                        animation: {
                            onComplete: function () {
                                isChartRendered = false
                            }
                        }
                    }
                });
            }

            function renderGraphicLine2(data) {

                var ctxStaticsCarrersLine = document.getElementById('static_carrer_line').getContext('2d');

                var myLineChart = new Chart(ctxStaticsCarrersLine, {
                    type: 'line',
                    data: {
                        labels: ["0 <","00:07 - 10:00", "10:00 - 13:00", "13:00 >"],
                        datasets: [{
                            label: 'Faltas',
                            backgroundColor: 'rgb(53,144,243)',
                            borderColor: 'rgb(53,144,243)',
                            data: [0, data.minusToTen, data.majorToTenAndMinusToThirteen, data.majorToThirteen, (data.majorToThirteen + 1)],
                            fill: false,
                        }]
                    },
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Gráfica que muestra la cantidad de faltas por rangos de horarios.'
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: false,
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Rangos de horas'
                                }
                            }],
                            yAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Horas'
                                }
                            }]
                        }
                    }
                });
            }
        }

    </script>

@endsection
