<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\models\Admin::create([
            'name'=>'saed',
            'email'=>'saed@saed.com',
            'password'=>bcrypt('123456789')
        ]);

    }
}
