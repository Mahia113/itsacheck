@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            @include('layouts.aside')

            <div class="col-md-9">

                <div class="card padding-card">

                    <h3>Edita tu información personal</h3>

                    <div class="col-md-8 offset-md-2 margin-top-card">

                       <div class="col-md-12">
                           
                           <div class="row">
                               <div class="col-md-3">
                                   <img src="/img/avatar.png" alt="Directivo" class="img-thumbnail">
                               </div>
                               <div class="col-md-9">
                                   <h5>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} {{Auth::user()->last_name2}}</h5>
                                   <h6>Directivo</h6>
                               </div>
                           </div>
                           
                       </div>

                        <div class="col-md-10 offset-md-1 margin-top-card">

                            <form action="{{ route('profile.update', $user->id) }}" method="post">
                                @method('PATCH')
                                @csrf
                                <div class="form-group">
                                    <label for="first name">Nombre</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="emailHelp" placeholder="Introduce tu nombre" value="{{ $user->first_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="last name">Apellido paterno</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Introduce tu apellido paterno" value="{{ $user->last_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="last name2">Apellido materno</label>
                                    <input type="text" class="form-control" id="last_name2" name="last_name2" placeholder="Introduce tu apellido materno" value="{{ $user->last_name2 }}">
                                </div>

                                <button type="submit" class="btn btn-primary">{{ __('Guardas cambios') }}</button>
                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection