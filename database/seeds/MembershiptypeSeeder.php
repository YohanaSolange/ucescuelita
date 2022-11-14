<?php

use Illuminate\Database\Seeder;
use App\Membershiptype;

class MembershiptypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $membership = Membershiptype::create(['name' => 'Mensualidad']);
        $membership = Membershiptype::create(['name' => 'Matricula']);
        $membership = Membershiptype::create(['name' => 'Otro']);
    }
}
