@extends('templates.main')

@section('content')
    <div>
        <div class="container pt-3">
            <div class="card">
              <div class="card-header">
                <h2 align="center">
                        <i class="material-icons fs-1">add_box</i>Actualizar Estudiante
                </h2>
              </div>
              <form method="post" action="{{url('student/'.$student->id.'/edit/storage')}}">
                <div class="card-body">
                  {{csrf_field()}}
                  <div class="form-group">
                      <label>Nombre </label>
                      <input type="text" class="form-control" name="name" value="{{$student->name}}" required>
                  </div>
                  <div class="form-group">
                      <label>Rut</label>
                      <input type="text" class="form-control" name="rut"  value="{{$student->rut}}" required>
                  </div>
                  <div class="form-group">
                      <label>Telefono</label>
                      <input type="text" class="form-control" name="phone"  value="{{$student->phone}}" required>
                  </div>
                  <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" name="email"  value="{{$student->email}}" required>
                  </div>
                  <div class="form-group">
                      <label>Fecha de Nacimiento</label>
                      <input type="date" class="form-control" name="birthday"  value="{{$student->birthday}}" required>
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