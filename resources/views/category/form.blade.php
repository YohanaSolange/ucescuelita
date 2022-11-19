@extends('templates.main')

@section('content')
    <div>
        <div class="container pt-3">
            <div class="card">
              <div class="card-header">
                <h2 align="center">
                        <i class="material-icons fs-1">add_box</i>Agregar Categoria
                </h2>
              </div>
              <form method="post" action="{{url('category/add/storage')}}">
                <div class="card-body">
                  {{csrf_field()}}
                  
                  <div class="form-group">
                      <label>Nombre Categoria</label>
                      <input type="text" class="form-control" name="name"  value="" required>
                  </div>
                  <div class="form-group">
                      <label>Inicio de Año</label>
                      <input type="number" step="any" class="form-control" name="start_year"  value="" required>
                  </div>
                  <div class="form-group">
                      <label>Fin de Año</label>
                      <input type="number" step="any" class="form-control" name="end_year"  value="" required>
                  </div>
                    
                </div>
                <div class="card-footer d-flex  justify-content-between">
                  <button type="submit" class="btn btn-success ">
                      <i class="material-icons">done</i>
                      Guardar
                  </button>
                 
                </div>
              </form>
            </div>
        </div>
    </div>
@stop