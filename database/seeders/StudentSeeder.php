<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //  ============  using json file =================

        $file=File::get(path:'database/json/student.json');
        $students=collect(json_decode($file,true));

        // ==========  using infile students array ===========
        // $students = collect([
        //     [
        //         'full_name' => 'Dhruv rana',
        //         'email' => 'rana@gmail.com',
        //     ],
        //     [
        //         'full_name' => 'Dev',
        //         'email' => 'dev@gmail.com',
        //     ],
        //     [
        //         'full_name' => 'base',
        //         'email' => 'base@gmail.com',
        //     ],
        //     [
        //         'full_name' => 'best',
        //         'email' => 'best@gmail.com',
        //     ],
        //     [
        //         'full_name' => 'nomer',
        //         'email' => 'nomer@gmail.com',
        //     ],
        // ]);
        //

        // =======  common logic for file and infile student array ============
        
        $students->each(function($student){
        Student::insert($student);
        });

        // ============   using fake function =====================

        // for ($i = 0; $i < 10; $i++) {
        //     Student::create([
        //         'full_name' => fake()->name('male'),
        //         'email' => fake()->email(),
        //     ]);
        // }

    }
}
