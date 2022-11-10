<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::create([
          
            'name'=>'Kinder Fútbol',
            'start_year'=>2016,
            'end_year'=>2018,

        ]);
        
        $category = Category::create([
          
            'name'=>'Iniciación',
            'start_year'=>2014,
            'end_year'=>2015,

        ]);
        
        $category = Category::create([
          
            'name'=>'Tradicional 1',
            'start_year'=>2012,
            'end_year'=>2013,

        ]);

        $category = Category::create([
          
            'name'=>'Tradicional 2',
            'start_year'=>2010,
            'end_year'=>2012,

        ]);

        $category = Category::create([
          
            'name'=>'Tradicional 3',
            'start_year'=>2008,
            'end_year'=>2009,

        ]);

        $category = Category::create([
          
            'name'=>'Arqueros',
            'start_year'=>2006,
            'end_year'=>2015,

        ]);

        $category = Category::create([
          
            'name'=>'Juvenil',
            'start_year'=>2006,
            'end_year'=>2008,

        ]);

        $category = Category::create([
          
            'name'=>'Femenino Base',

        ]);

        $category = Category::create([
          
            'name'=>'Femenino Tradicional',

        ]);
    }
}
