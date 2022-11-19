<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //aca se declaran todas las columnas del modelo
protected $fillable = [
    'name', 'start_year', 'end_year'
];
    
}
