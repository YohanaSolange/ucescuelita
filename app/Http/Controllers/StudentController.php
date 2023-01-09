<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Category;
use App\Membership;
use Barryvdh\DomPDF\Facade as PDF;

class StudentController extends Controller
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
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
    // llama vista list estidiante
    public function list ()
    {
        return view ('student.list');
    }
//crea metodo ajax que retorna los datos a un datatable estudiante
    public function getdata(){
        $students = Student::all();
        return DataTables::of($students)->make(true);
    }


    //crea metodo ajax que retorna los datos a un datatable membership
    public function getdatamembership($student_id){
         // $membership= Membership::finOrFail($student_id);
         $memberships = Membership::where('student_id','=',$student_id)
                        ->with('membershiptype')
                        ->get();

         return DataTables::of($memberships)->make(true);
    }
  // llama vista list membership
  public function listmembership ()
  {
      return view ('student.list');
  }

    //agregar estudiante
    public function add(){
        $students = new Student;//TODO: hay eliminar esta linea y sacar del form los values

        $categories = Category::all();//me trae todo el registro de la tabla category
        return view('Student.form',compact('students','categories'));
    }

    //extraer los datos del registro del estudiante
    public function addStorage(Request $request){

        $input= $request->all();
        $student = Student::create($input);
        //TODO: Generar las membresias del estudiante recien creado
        $month = now()->month;
        $year = now()->year;
        $name=$student->name;
        //crea la matricula
        Membership::create([
            "student_id" => $student->id,
            "month" => $month,
            "year" => $year,
            "ammount" => 30000,
            "membershiptype_id" => 2,
            "status" => 0
        ]);

        //iteracion para los meses que quedan
        for($i = $month; $i <= 12; $i++){
            Membership::create([
                "student_id" => $student->id,
                "month" => $i,
                "year" => $year,
                "ammount" => $student->month_ammount,
                "membershiptype_id" => 1,
                "status" => 0
            ]);
        }

        //iteracion para enero y febrero del siguiente año
        for($i = 1; $i <= 2; $i++){
            Membership::create([
                "student_id" => $student->id,
                "month" => $i,
                "year" => $year + 1,
                "ammount" => $student->month_ammount,
                "membershiptype_id" => 1,
                "status" => 0
            ]);
        }


        $msj= 'Estudiante '.$name.' agregado Correctamente';
        $redict='/student';
        return view ('templates.msj',compact('msj','redict'));

        /**$students = new Student($id);
            $students->name;
            $students->rut;
            $students->phone;
            $students->birthday;
            $students->email;
            $students->save();
            activitypush('AGREGA', 'ESTUDIANTE AGREGADO');
            return redirect()->route('student.list')->with('success', 'Alumno agregado correctamente');
            */
    }

    public function showEdit ($student_id){
        //dd($student_id);

        //- con el id buscar el estudiante
        //- retornar una vista y pasarle como parametro el estudiante buscado
        $student = Student::findOrFail($student_id);
        //$categories = Category::findOrFail($category_id); //findOrfFails busca un elemento select top 1 * algo
        $categories = Category::all();
        return view('student.edit',compact('student','categories'));//compact pasa $variable a la vista =echo
    }

    public function editStorage(Request $request, $student_id){


        //Si encuentra el ID edita
        $student = Student::findOrFail($student_id);
        $student->update($request->all());
       /* $student->name =  $request->name;
        $student->rut =  $request->rut;
        $student->phone =  $request->phone;
        $student->birthday=  $request->birthday;
        $student->email =  $request->email; */
        $student->save();

        $msj = 'Estudiante ' . $student->name . ' Modificado';
        $redict ='/student';
        return view('templates.msj',compact('msj','redict'));
       // return redirect()->to('/');
        #activitypush('AGREGA', 'PERSONA AGREGA USUARIO');
        #return redirect()->route('student.list')->with('success', 'Estudiante editado correctamente');


    }


    public function detail($student_id){

        $student = Student::findOrFail($student_id);

        //dd($student->rut);

       return view ('student.detail',compact('student'));

    }

    public function delete($student_id){
        //Si encuentra el ID edita
       $membership = Membership::all();
        $student = Student::findOrFail($student_id);

        $redict='/student';
        $activo=$student->enabled; 
        //$membershipactivo= $membership->enabled;
        if ($activo==1 ){
           // $redictok='student/'.$student_id.'/delete/'.$activo.'/process/'.$membershipactivo;
            $redictok='student/'.$student_id.'/delete/'.$activo.'/process';
            $msjconfirmation = '¿Esta seguro de "BORRAR" al Estudiante '. $student->name.'?';
       
            return view('templates.msjconfirmation',compact('msjconfirmation','redict','redictok'));
        } else {
           // $redictok='student/'.$student_id.'/activate/'.$activo.'/process/'.$membershipactivo;
            $redictok='student/'.$student_id.'/activate/'.$activo.'/process';
            $msjconfirmation = '¿Esta seguro de "ACTIVAR" al Estudiante '. $student->name.'?';
   
        return view('templates.msjconfirmation',compact('msjconfirmation','redict','redictok'));
        }
        
    }

    public function deleteprocess($student_id, $activo){
          //Si encuentra el ID edita
        $student = Student::findOrFail($student_id);
        //deshabilita estudiante

        //me trae solo las membresias pendientes de pago (status=0)
        $memberships = Membership::where('student_id','=',$student_id)
                        ->where('status','=',0)
                        ->get();
        //deshabilitar membresias

        foreach($memberships as $membership){
            
            $membership->enabled = 0;
            $membership->save();
        }
        $activo=$student->enabled;
       //dd($membership->enabled);
       
        if ($student->enabled==1 ){
        $inactivo=0;
        $student->enabled=  $inactivo;
        $student->save();
        
        $msj = 'El estudiante '.$student->name.' a sido Desactivado del sistema';
        $redict ='/student';
        return view('templates.msj',compact('msj','redict')); 

        }else {
        $activo=1;
        $student->enabled= $activo;
        $student->save();
        
        $msj = 'El estudiante '.$student->name.' se Activa en el sistema';
        $redict ='/student';
        return view('templates.msj',compact('msj','redict')); 
        }
}

    public function pdf($student_id){

        $student = Student::findOrFail($student_id);

        //metodo que retorna el pdf con la libreria dom pdf
        $pdf = PDF::loadView('student.pdf', compact('student'))->setOptions(['isRemoteEnabled' => true,'name'=>'Ficha Estudiante']);
        return $pdf->stream('invoice.pdf');
    }
}
