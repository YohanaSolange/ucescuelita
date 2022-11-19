@extends('templates.main')

@section('content')
    <div>
        <div class="container pt-3">
            <div class="card">
              <div class="card-header">
                <h2 align="center">
                        <i class="material-icons fs-1">add_box</i>Agregar Estudiante
                </h2>
              </div>
              <form method="post" action="{{url('student/add/storage')}}">
                <div class="card-body">
                  {{csrf_field()}}
                  <div class="form-group">
                      <label>Nombre </label>
                      <input type="text" class="form-control" name="name" value="{{$students->name}}" required>
                  </div>
                  <div class="form-group">
                      <label>Rut</label>
                      <input type="text" class="form-control" name="rut"  value="{{$students->rut}}" required>
                  </div>
                  <div class="form-group">
                      <label>Telefono</label>
                      <input type="text" class="form-control" name="phone"  value="{{$students->phone}}" required>
                  </div>
                  <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" name="email"  value="{{$students->email}}" required>
                  </div>
                  <div class="form-group">
                      <label>Fecha de Nacimiento</label>
                      <input type="date" class="form-control" name="birthday"  value="{{$students->birthday}}" required>
                  </div>
                  <div class="form-group">
                      <label>Altura</label>
                      <input type="number" step="any" class="form-control" name="height"  value="{{$students->height}}">
                  </div>
                  <div class="form-group">
                      <label>Peso</label>
                      <input type="number" step="any" class="form-control" name="weight"  value="{{$students->weight}}">
                  </div>
                    <div class="form-group"> 
                    <label>Categoria</label>
                    <select class="form-select" aria-label="Default select example" name="category_id" required>
                     <option value=""> Seleccione una Categoria</option> 
                     @foreach($categories as $category) 
                    <option value="{{$category->id}}">{{$category->name}}</option>
                     @endforeach
                     </select>
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