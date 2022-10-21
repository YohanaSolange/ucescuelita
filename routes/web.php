<?php

use Illuminate\Support\Facades\Route;

Route::get('/','SesionController@home')->name('login');
Route::post('sesion/login'                              , 'SesionController@login');

Route::get('sesion/passwordlost'                        , 'SesionController@passwordLost');
Route::post('sesion/passwordlost/process'               , 'SesionController@passwordLostProcess');

Route::get('sesion/passwordreset/{user_id}/token/{token}'           , 'SesionController@passwordReset');
Route::post('sesion/passwordreset/{user_id}/token/{token}/process'  , 'SesionController@passwordResetProcess');


Route::group(['middleware' => ['auth']], function() {

    //Rutas Sesion
    Route::get('sesion/passwordchange','SesionController@passwordChange');
    Route::post('sesion/passwordchange/process','SesionController@passwordChangeProcess');
    Route::get('sesion/logout','SesionController@logout');

    //Rutas de Usuarios
    Route::get('config/users'                           , 'UserController@list')->name('users.list');
    Route::get('config/users/getdata'                   , 'UserController@getdata');
    Route::get('config/users/add'                       , 'UserController@add');
    //Route::get('config/users/{user_id}'                 , 'UserController@edit');
    //Route::post('config/users/store'                    , 'UserController@store');

    //Ruta Estudiantes
    Route::get('student', 'StudentController@list');
    Route::get('student/getdata', 'StudentController@getdata');
    Route::get('student', 'StudentController@list')->name('student.list');

    //muestra pantalla para AGREGAR estudiante y la otra procesa (post)
    Route::get('student/add', 'StudentController@add');
    Route::post('student/add/storage', 'StudentController@addStorage');

    //mostrar pantalla para editar estudiante
    Route::get('student/{student_id}/edit', 'StudentController@showEdit');
    Route::post('student/{student_id}/edit/storage', 'StudentController@editStorage');

    //detalles del estudiante
    Route::get('student/{student_id}/detail','StudentController@detail');

});

Route::get('student/pago', 'MembershipController@pago');

