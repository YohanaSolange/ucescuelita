@extends('templates.clients.header')
@section('content')
    <body class="bg-light h-100 d-flex justify-content-center align-items-center">
        <div class="card bg-dark text-white m-2">
            <div class="row m-0">

                <div class="col-12">
                    <div class="card-body">
                        <form action="{{url('student/pay/consult/process')}}" method="POST">
                            {{ csrf_field() }}

                            <h4 class="card-title" align="center">
                            <b>Nombre: </b>{{$student->name}}</b>
                            <br>
                            <b>Rut: </b> {{$student->rut}}</b>
                            <br>
                            <b>El estudiante posee una deuda de: $ {{$memberships->sum('ammount')}}</b>
                            </h4>
                            <br>

                            <input type="hidden" name="rut" value="{{$student->rut}}">

                            @foreach ($memberships as $membership)

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" name="selected_memberships[]">
                                <label class="form-check-label" for="exampleCheck1">{{$membership->month}} / {{$membership->year}} / {{$membership->membershiptype->name}}</label>
                            </div>
                            @endforeach

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

