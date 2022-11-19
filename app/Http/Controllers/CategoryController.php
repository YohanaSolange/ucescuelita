<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    public function list ()
    {
        return view ('category.list');
    }


//crea metodo ajax que retorna los datos a un datatable
    public function getdata(){
        $categories = Category::all();
        return DataTables::of($categories)->make(true);
    }

    public function add(){
        $categories = new Category;//TODO: hay eliminar esta linea y sacar del form los values 

        $categories = Category::all();//me trae todo el registro de la tabla category 
        return view('Category.form',compact('categories'));
    }
    //extraer los datos del registro del estudiante 
    public function addStorage(Request $request){
           
        $input= $request->all();
        
    
        $categories = Category::create($input);
        //TODO: Generar las membresias del estudiante recien creado
        
        $msj= 'Categoria agregado Correctamente';
        $redict='/category';
        return view ('templates.msj',compact('msj','redict'));
        
    }

    public function showEdit ($category_id){
        //dd($student_id);

        //- con el id buscar el estudiante
        //- retornar una vista y pasarle como parametro el estudiante buscado
        $category = Category::findOrFail($category_id);
        //$categories = Category::findOrFail($category_id); //findOrfFails busca un elemento select top 1 * algo
        //$categories = Category::all();
        return view('category.edit',compact('category'));//compact pasa $variable a la vista =echo
    }

    public function editStorage(Request $request, $category_id){
       
        //Si encuentra el ID edita
        $category = Category::findOrFail($category_id);
        $category->update($request->all());
      
        $category->save();

        $msj = 'Estudiante ' . $category->name . ' Modificado';
        $redict ='/category';
        return view('templates.msj',compact('msj','redict'));

    }
    public function detail($category_id){

        $category = Category::findOrFail($category_id);

        //dd($category->rut);
        
        return view ('category.detail',compact('category')); 

    }

}
