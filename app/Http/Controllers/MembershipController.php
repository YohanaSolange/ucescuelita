<?php

namespace App\Http\Controllers;

use App\Membership;
use Illuminate\Http\Request;
use App\Student;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function show(Membership $membership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function edit(Membership $membership)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membership $membership)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membership $membership)
    {
        //
    }

    public function pay(){

     //   $student = Student::findOrFail($student_id);

     //   dd($student->rut);

      //  return view ('student.pago',compact('student'));
      return view ('templates.clients.pay');
    }

    public function consult(Request $request){
        //te entrega lo que se escribio de un formulario
        $input = $request->all();
        //select * from student where rut = input del formulario [rut] too 1
        $student = Student::where('rut',"=",$input['rut'])->first();

        //dd($student);
        //valida si el consultante es nulo
        if(is_null($student)){
            //TODO: mostrar mensaje mas bonito de validacion
            echo "Estudiante no encontrado";
        }else{
            //si el estudiante existe buscaremos todas sus membresias y calcularemos cuanto debe
            $memberships = Membership::where('student_id','=',$student->id)->where('status','=',1)->get();


            return view ('templates.clients.consult',compact('student','memberships'));
        }


          //($student->rut);

         //  return view ('student.pago',compact('student'));
        // return view ('templates.clientes.pago');
       }

       //metodo para procesar la peticion de pago
       public function consultProcess(Request $request){
        //TODO: se deben añadir validaciones y posible integracion con webpay?

        echo "Se ha realizado el pago con exito !" .$request['rut'];
       }
}
