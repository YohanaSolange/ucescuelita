<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //aca se declaran todas las columnas del modelo
    protected $fillable = [
        'name', 'email', 'birthday','phone','rut','height','weight','category_id'
    ];

    //metodo para establecer la relacion con el modelo category
    public function category(){
        //yo la clase student pertenesco a la clase category
        return $this->belongsTo(Category::class);
    }
    
}
