<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = Student::create([
            'name' => 'Juanito Perez',
            'email' => 'juan.perez@gmail.com',
            'rut' => '17111222-k',
            'phone'=>'99009921',
            'birthday' => '2000-01-01',

        ]);
    }
    
}
