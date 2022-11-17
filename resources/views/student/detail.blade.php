@extends('templates.main')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.11.3/b-2.1.1/b-colvis-2.1.1/b-html5-2.1.1/b-print-2.1.1/date-1.1.1/fh-3.2.1/r-2.2.9/datatables.min.css"/>
<style>
    #tabla_filter{
        text-align: right;
    }
    #tabla_paginate .pagination{
        justify-content: flex-end
    }
</style>
@section('content')
    <div>
        <div class="container pt-3">
            <div class="card">
              <div class="card-header">
                <h2 align="center">
                        <i class="material-icons fs-1">assignment_ind</i> Detalle del Estudiante {{$student->name}}
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
                {{--Accedo al nombre de la categoria por el metodo category creado en el modelo student--}}
                <b>Categoria: </b> {{$student->category->name}}
                </div>

            <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4><i class="material-icons fs-1">assignment_turned_in</i> Membresias del Estudiante </h4>

            </div>
        </div>
        <div class="card-body">
            <table id="tabla" class="table table-striped table-sm table-bordered bg-white" style="width:100%" >
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Mes</th>
                        <th>Año</th>
                        <th>Monto</th>
                        <th>Estado</th>
                        <th>Estudiante</th>
                        <th>Tipo de Membresia</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.11.3/b-2.1.1/b-colvis-2.1.1/b-html5-2.1.1/b-print-2.1.1/date-1.1.1/fh-3.2.1/r-2.2.9/datatables.min.js"></script>

    <script src="{{url('/js/datatable.es.js')}}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#tabla').DataTable({
                responsive: true,
                dom: '<"row"<"col-12 mb-2"B><"col-12 col-sm-6"l><"col-12 col-sm-6"f><"col-12"t><"col-12 col-sm-6"i><"col-12 col-sm-6"p>>',
                buttons: [
                    {
                        extend:    'excelHtml5',
                        text:      '<i class="material-icons">grid_on</i> Excel',
                        className: 'btn-success',
                        titleAttr: 'Excel'
                    },
                    {
                        extend:    'pdfHtml5',
                        text:      '<i class="material-icons">picture_as_pdf</i> Pdf',
                        className: 'btn-danger',
                        titleAttr: 'PDF'
                    }
                ],
                fixedHeader: {
                    headerOffset: 0
                },
                "processing" : true,
                "serverSide" : true,
                "ajax" : "{{ url('student/'.$student->id.'/getdatamembership') }}",
                "columns": [
                    { "data": "id"},
                    { "data": "month"},
                    { "data": "year"},
                    { "data": "ammount"},
                    { data: "status", render : function ( data, type, row, meta ) {
                        if(data == 0){
                            variable = '<span class="badge bg-warning">Pendiente</span>'
                        }else{
                            variable = '<span class="badge bg-success">pagado</span>'
                        }
                        return variable;
                    }},
                    { "data": "student_id"},
                    { data: "membershiptype.name", render : function ( data, type, row, meta ) {
                        if(data == "membresia"){
                            variable = '<span class="badge bg-warning">Pendiente</span>'
                        }else{
                            variable = '<span class="badge bg-success">pagado</span>'
                        }
                        return variable;
                    }},

                ],
                language: lenguaje_es,
                "order": [[ 0, "desc" ]]
            });
        });
    </script>


@stop


