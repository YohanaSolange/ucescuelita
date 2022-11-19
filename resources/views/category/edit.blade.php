@extends('templates.main')

@section('content')
    <div>
        <div class="container pt-3">
            <div class="card">
              <div class="card-header">
                <h2 align="center">
                        <i class="material-icons fs-1">edit</i>Editar Categoria
                </h2>
              </div>
               <form method="post" action="{{url('category/'.$category->id.'/edit/storage')}}">
    
                <div class="card-body">
                  {{csrf_field()}}
                  
                  <div class="form-group">
                      <label>Nombre de la Categoria</label>
                      <input type="text" class="form-control" name="name"  value="{{$category->name}}" required>
                  </div>
                  <div class="form-group">
                      <label>Año Inicial</label>
                      <input type="number" step="any" class="form-control" name="start_year"  value="{{$category->start_year}}" required>
                  </div>
                  <div class="form-group">
                      <label>Año Final</label>
                      <input type="number" step="any" class="form-control" name="end_year"  value="{{$category->end_year}}" required>
                  </div>

                 
                </div>
                <div class="card-footer d-flex  justify-content-between">
                  <button type="submit" class="btn btn-success ">
                      <i class="material-icons">done</i>
                      Actualizar
                  </button>
                 
                </div>
              </form>
            </div>
        </div>
    </div>
@stop