<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


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
    // llama vista list
    public function list ()
    {
        return view ('student.list');
    }
//crea metodo ajax que retorna los datos a un datatable
    public function getdata(){
        $students = Student::all();
        return DataTables::of($students)->make(true);
    }
//agregar estudiante
    public function add(){
        $students = new Student;
        return view('Student.form',compact('students'));
    }
//extraer los datos del registro del estudiante 
    public function addStorage(Request $request){
           
        $input= $request->all();
        
    
        $student = Student::create($input);
        $msj= 'Estudiante agregado Correctamente';
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
        return view('student.edit',compact('student'));//compact pasa $variable a la vista =echo
    }

    public function editStorage(Request $request, $student_id){
       
     
        //Si encuentra el ID edita
        $student = Student::findOrFail($student_id);
        $student->name =  $request->name;
        $student->rut =  $request->rut;
        $student->phone =  $request->phone;
        $student->birthday=  $request->birthday;
        $student->email =  $request->email;
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
}
