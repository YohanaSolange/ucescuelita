<?php

use Illuminate\Database\Seeder;
use App\Student;
use App\Membership;

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
            'height'=> 160,
            'weight'=>60,
            'category_id'=> 1,

        ]);

        //para el estudiante creado creara varias membresias para trabajar el modelo de cobranza
        $months = [11,12];
        $year = 2022;

        foreach($months as $month)
        {
            $membership = Membership::create([
                'month' => $month,
                'year' => $year,
                'ammount' => 25000,
                'status' => 1,
                'student_id' => $student->id,
                'membershiptype_id' => 1
            ]);
        }

        //crea ademas 1 cobranza del tipo matricula
        $membership = Membership::create([
            'year' => $year,
            'ammount' => 30000,
            'status' => 1,
            'month' => 11,
            'student_id' => $student->id,
            'membershiptype_id' => 2
        ]);
    }

}
