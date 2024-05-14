<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Parents::create([

            'email' => 'muhammad@gmail.com',
            'username' => 'Afif',
            'password' => bcrypt('123'),
            'no_wa' => bcrypt('085765290')

        ]);
    }
}
