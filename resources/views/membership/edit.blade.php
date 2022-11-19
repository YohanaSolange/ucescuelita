@extends('templates.main')

@section('content')
    <div>
        <div class="container pt-3">
            <div class="card">
              <div class="card-header">
                <h2 align="center">
                        <i class="material-icons fs-1">edit</i>Editar Membresia
                </h2>
              </div>
                <form method="post" action="{{url('membership/'.$membership->id.'/edit/storage')}}">
                    <div class="card-body">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Monto </label>
                        <input type="number" class="form-control" name="ammount" value="{{$membership->ammount}}" required>
                    </div>

                    <div class="form-group">
                        <label>Estado</label>
                        <select class="form-select" name="status" required>
                            <option value="1" {{$membership->status == 1 ? 'selected' : ''}} >Pagado</option>
                            <option value="0" {{$membership->status == 0 ? 'selected' : ''}} >Pendiente</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Estado</label>
                        <select class="form-select" name="enabled" required>
                            <option value="1" {{$membership->enabled == 1 ? 'selected' : ''}} >Activo</option>
                            <option value="0" {{$membership->enabled == 0 ? 'selected' : ''}} >Anulado</option>
                        </select>
                        </div>
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
