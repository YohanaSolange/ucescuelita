@extends('templates.main')

@section('content')
    <div>
        <div class="container pt-3">
            <div class="card">
              <div class="card-header">
                <h2 align="center">
                </h2>
              </div>
              <form method="post" action="{{url('config/users/store')}}">
                <div class="card-body">
                  {{csrf_field()}}
                  <input type="hidden" name="id" value="{{ $user->id }}">
                  <div class="form-group">
                      <label>Nombre Usuario</label>
                      <input type="text" class="form-control" name="name" value="{{$user->name}}" required>
                  </div>
                  <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" name="email"  value="{{$user->email}}" required>
                 
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