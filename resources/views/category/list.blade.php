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
    <div class="card">
        
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h2><i class="material-icons fs-1">recent_actors</i> Lista de Categorias</h2>
                <a  href="{{ url('category/add')}}" class="btn btn-success">
                    <i class="material-icons">add</i>
                    Agregar Categoria
                </a>
            </div>
        </div>
        <div class="card-body">
            <table id="tabla" class="table table-striped table-sm table-bordered bg-white" style="width:100%" >
                <thead>
                    <tr>
                        <th>Nombre Categoria</th>
                        <th>Año de Inicio</th>
                        <th>Año final</th>
                        <th>Editar</th>
                        <th>Detalle</th>
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
                "ajax" : "{{ url('category/getdata') }}",
                "columns": [
                    { "data": "name"},
                    { "data": "start_year"},
                    { "data": "end_year"},
                    { data: "id", render : function ( data, type, row, meta ) {
                         var buttons = '<a class="btn btn-primary" href="{{ url("category")}}/'+data+'/edit" title="Editar"><i class="material-icons">edit</i></a>';
                        return buttons;
                    }},
                     { data: "id", render : function ( data, type, row, meta ) {
                         var buttons = '<a class="btn btn-info" href="{{ url("category")}}/'+data+'/detail" title="Detail"><i class="material-icons">search</i></a>';
                        return buttons;
                    }}
                  
                ],
                language: lenguaje_es,
                "order": [[ 0, "desc" ]]
            });
        });
    </script>
 @stop