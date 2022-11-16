@extends('templates.main')

@section('content')
    <div>
        <div class="container pt-3">
            <div class="card">
              <div class="card-header">
                <h2 align="center">
                        <i class="material-icons fs-1">recent_actors</i> Categoria {{$category->name}}
                </h2>


              </div>

              <div class="card-body"> 
            <b>Año Inicial: </b> {{$category->start_year}}<br>
            <b>Año Final:</b> {{$category->end_year}}<br>
            </div>
            
            </div>
        </div>
    </div>
@stop