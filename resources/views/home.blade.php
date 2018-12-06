@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">

            @include('layouts.aside')

            <div class="col-md-8">

                <div class="row ">

                    <div class="col-md-6">
                        <div class="card">
                            {{$no_assistance}} / {{$assistance}}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci at autem consequatur cum distinctio doloribus ea
                            eius enim labore laboriosam libero maiores minus neque, officia quaerat ratione reprehenderit suscipit!
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid animi dolores, eligendi, esse expedita incidunt
                            itaque maiores nostrum perspiciatis sint totam veniam voluptas! Adipisci blanditiis nobis nulla odit repellendus repudiandae.
                        </div>
                    </div>

                </div>

                <div class="row margin-top-card">

                    <div class="col-md-12">
                        <div class="card">
                            {{ $profesorWithMoreInassistance  }}
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
