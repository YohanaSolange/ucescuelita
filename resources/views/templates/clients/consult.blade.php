@extends('templates.clients.header')
@section('content')
    <body class="bg-light h-100 d-flex justify-content-center align-items-center">
        <div class="card bg-dark text-white m-2">
            <div class="row m-0">
             
                <div class="col-12">
                    <div class="card-body">
                        <form action="#" method="POST">
                            {{ csrf_field() }}
                           
                            <h4 class="card-title" align="center">
                            <b>Nombre: </b>{{$student->name}}
                            <br>
                            <b>Rut: </b> {{$student->rut}}
                            </h4>
                            <br>
                            <h4 class="card-title" align="center">Seleccione los meses que desea pagar </h4>
                            <div class="mb-3 form-check">
                             <input type="checkbox" class="form-check-input" id="exampleCheck1">
                             <label class="form-check-label" for="exampleCheck1">Febrero </label>
                            </div>
                            <div class="mb-3 form-check">
                             <input type="checkbox" class="form-check-input" id="exampleCheck1">
                             <label class="form-check-label" for="exampleCheck1">Marzo </label>
                            </div>
                           
                            <div class="mb-3 form-check">
                             <input type="checkbox" class="form-check-input" id="exampleCheck1">
                             <label class="form-check-label" for="exampleCheck1">Junio </label>
                            </div>
                            <div class="mb-3 form-check">
                             <input type="checkbox" class="form-check-input" id="exampleCheck1">
                             <label class="form-check-label" for="exampleCheck1">Julio </label>
                            </div>
                            <div class="mb-4"><a href="#" class="link-light" style="font-size: 0.8rem"></a></div>
                            <button type="submit" class="btn btn-outline-light w-100">
                                <i class="material-icons">send</i> Consultar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    @stop
    
