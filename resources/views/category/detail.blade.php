@extends('templates.main')

@section('content')
    <div>
        <div class="container pt-3">
            <div class="card">
              <div class="card-header">
                <h2 align="center">
                        <i class="material-icons fs-1"></i> Categoria {{$category->name}}
                </h2>


              </div>

              <div class="card-body"> 
            <b>Año de Inicio: </b> {{$category->start_year}}<br>
            <b>Año de Fin:</b> {{$category->end_year}}<br>
            </div>
            
            </div>
        </div>
    </div>
@stop