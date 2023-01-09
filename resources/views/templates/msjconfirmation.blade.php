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
        
        <div class="w3-red">
            <div class="success">
                <h2><i class="material-icons fs-1" >live_help</i>   {{$msjconfirmation}}    </h2>  
            </div>


            <br> </br>
         
            
                <a  href="{{ url($redict)}}" class="btn btn-Dark " >
                    <i class="material-icons ">cancel</i>
                    No
                </a>
                
                <a  href="{{ url($redictok)}}" class="btn btn-Success" >
                    <i class="material-icons ">check</i>
                    Sí
                </a>



              
        </div>
    </div>


   

 @stop