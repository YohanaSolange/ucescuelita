@extends('templates.main')

@section('content')
    <div>
        <div class="container pt-3">
            <div class="card">
              <div class="card-header">
                <h2 align="center">
                        <i class="material-icons fs-1">add_box</i> Estudiante {{$student->name}}
                </h2>


              </div>

              <div class="card-body"> 
            <b>Nombre: </b>{{$student->name}}<br>
            <b>Rut: </b> {{$student->rut}}<br>
            <b>Telefono:</b> {{$student->phone}}<br>
            <b>Email:</b>{{$student->email}}<br>
            <b>Fecha Nacimiento:</b>{{$student->birthday}}<br>
            <b>Altura:</b>{{$student->height}}<br>
            <b>Peso:</b>{{$student->weight}}<br>
            </div>
            
            </div>
        </div>
    </div>
@stop