<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'=>'Aicha Sene',
                'adresse'=> 'Pikine',
                'telephone'=> '781234567',
                'email'=>'aicha@agritech.com',
                'password'=> Hash::make('passer'),
                'type'=>1,
            ],
            [
                'name'=>'Bobo Sow',
                'adresse'=> 'Medina',
                'telephone'=> '775334567',
                'email'=>'bobo@agritech.com',
                'password'=> Hash::make('passer'),
                'type'=>1,
            ],
            [
                'name'=>'Cheikh Bamba Seck',
                'adresse'=> 'Mbao',
                'telephone'=> '781834560',
                'email'=>'bamba@agritech.com',
                'password'=> Hash::make('passer'),
                'type'=>1,
            ],
            [
                'name'=>'Tidiane Diallo',
                'adresse'=> 'Mariste',
                'telephone'=> '776834560',
                'email'=>'tidiane@agritech.com',
                'password'=> Hash::make('passer'),
                'type'=>1,
            ],
        ];



        foreach ($users as $key => $user) {
            User::create($user);
        }

    }
}
