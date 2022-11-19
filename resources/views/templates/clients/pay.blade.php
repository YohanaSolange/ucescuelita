@extends('templates.clients.header')
@section('content')
    <body class="bg-light h-100 d-flex justify-content-center align-items-center">
        <div class="card bg-dark text-white m-2">
            <div class="row m-0">
             
                <div class="col-12">
                    <div class="card-body">
                        <form action="{{url('student/pay/consult')}}" method="POST">
                            {{ csrf_field() }}
                            <h4 class="card-title" align="center">Bienvenidos Al portal de Pagos </h4>
                            <h2 class="card-title" align="center">Escuela UC Quellón</h2>
                            <br>
                            <div class="mb-3">
                                <label for="login-email" class="form-label">RUT</label>
                                <input type="text" name="rut" class="form-control" id="login-rut" aria-describedby="emailHelp">
                                
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
    
