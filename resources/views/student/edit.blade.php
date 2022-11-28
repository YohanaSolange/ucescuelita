@extends('templates.main')

@section('content')
    <div>
        <div class="container pt-3">
            <div class="card">
              <div class="card-header">
                <h2 align="center">
                        <i class="material-icons fs-1">edit</i>Editar Estudiante
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
                  <div class="form-group">
                      <label>Altura</label>
                      <input type="number"  step="any" class="form-control" name="height"  value="{{$student->height}}">
                  </div>
                  <div class="form-group">
                      <label>Peso</label>
                      <input type="number" step="any" class="form-control" name="weight"  value="{{$student->weight}}">
                  </div>
                  <div class="form-group">
                      <label>Mensualidad</label>
                      <input type="number" step="any" class="form-control" name="month_ammount" value="{{$student->month_ammount}}">
                  </div>
                 <div class="form-group"> 
                    <label>Categoria</label>
                    <select class="form-select" aria-label="Default select example" name="category_id" required>
                     <option value=""> Seleccione una Categoria</option> 
                     @foreach($categories as $category) 
                        {{--Si el category->id es igual al student->id muestra esto--}}
                        @if($category->id==$student->category_id)
                        <option selected value="{{$category->id}}">{{$category->name}}</option>
                        @else
                        <option value="{{$category->id}}">{{$category->name}}</option>

                        @endif
                     @endforeach
                     </select>
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