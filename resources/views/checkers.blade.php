@extends('layouts.app')

@section('content')

    <script>

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

    </script>

    <div class="container">
        <div class="row">

            @include('layouts.aside')

            <div class="col-md-9">

                <div class="card padding-card">

                    <h3 class="margin-bottom-13px">Checadores registrados</h3>

                    <table class="table table-hover margin-bottom-50px" id="tblMain">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Email</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>

                            @for ($i = 0; $i < (sizeof($checkers)); $i++)
                                <tr class="data-row">
                                    <th class="id" scope="row">{{$checkers[$i]->id}}</th>
                                    <td class="name">{{$checkers[$i]->first_name}}</td>
                                    <td class="last-name">{{$checkers[$i]->last_name}}</td>
                                    <td class="email">{{$checkers[$i]->email}}</td>
                                    <td>
                                        <i id="edit-item" class="fas fa-edit margin-left-11px" data-item-id="{{$i}}" data-toggle="tooltip" data-placement="top" title="Editar" ></i>
                                        <i class="fas fa-trash-alt margin-left-11px" data-toggle="modal" data-target="#deleteModal"></i>
                                    </td>
                                </tr>
                            @endfor

                        </tbody>
                    </table>

                </div>

            </div>

        </div>

        <!-- Modal Edit -->
        <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Editar datos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="form-edit" action="{{route('checkers.update', 1)}}" method="post">

                        <div class="modal-body">

                                @method('PATCH')
                                @csrf
                                <div class="form-group">
                                    <label for="first name">Nombre</label>
                                    <input type="text" class="form-control" id="modal-input-name" name="first_name" placeholder="Introduce tu nombre" value="">
                                </div>
                                <div class="form-group">
                                    <label for="last name">Apellidos</label>
                                    <input type="text" class="form-control" id="modal-input-lastname" name="last_name" placeholder="Introduce tus apellidos" value="">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="modal-input-email" name="email" placeholder="Introduce tu email" value="">
                                </div>

                                <input type="hidden" class="form-control" id="modal-input-id" name="id" placeholder="Introduce tu nombre" value="">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">{{ __('Guardas cambios') }}</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Eliminar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6>¿Seguro que quieres elimnar a: Usuario ?</h6>
                        <h5>Esta opción no esta habilitada, por favor contacta al administrador del sistema.</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>

        $(document).ready(function() {
           /**
            * for showing edit item popup
            */
           var idUser=null;

           $(document).on('click', "#edit-item", function() {
               $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

               var options = {
                   'backdrop': 'static'
               };
               $('#edit-modal').modal(options)
           })

           // on modal show
           $('#edit-modal').on('show.bs.modal', function() {
               var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?
               var row = el.closest(".data-row");

               // get the data
               var id = row.children(".id").text();
               var name = row.children(".name").text();
               var lastname = row.children(".last-name").text();
               var email = row.children(".email").text();

               idUser = id;
               document.getElementById("form-edit").action = "http://127.0.0.1:8000/checkers/"+idUser;

               // fill the data in the input fields
               $("#modal-input-id").val(id);
               $("#modal-input-name").val(name);
               $("#modal-input-lastname").val(lastname);
               $("#modal-input-email").val(email);

           })

           // on modal hide
           $('#edit-modal').on('hide.bs.modal', function() {
               $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
               $("#edit-form").trigger("reset");
           })

       });
    </script>

@endsection