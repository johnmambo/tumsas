<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('password'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),

        ]);
        User::create([
            'name'=>'Prof. John',
            'email'=>'john@gmail.com',
            'password'=>bcrypt('password'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        User::create([
            'name'=>'Dr. Kaleli',
            'email'=>'kaleli@gmail.com',
            'password'=>bcrypt('password'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        User::create([
            'name'=>'mambo',
            'email'=>'mambo@gmail.com',
            'password'=>bcrypt('password'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        User::create([
            'name'=>'Kalusi',
            'email'=>'kalusi@gmail.com',
            'password'=>bcrypt('password'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
    }
}
