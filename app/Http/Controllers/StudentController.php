<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Category;
use App\Membership;


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
                "ammount" => 25000,
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
                "ammount" => 25000,
                "membershiptype_id" => 1,
                "status" => 0
            ]);
        }


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
}
