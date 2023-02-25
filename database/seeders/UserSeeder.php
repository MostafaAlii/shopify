<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{DB, Schema};

class UserSeeder extends Seeder
{
    public function run() {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->delete();
        $user = User::create([
            'name'          =>  'Mostafa Alii',
            'email'         =>  'admin@app.com',
            'password'      =>  '123123',
            'remember_token' => Str::random(10),
        ]);
        User::factory()->count(5)->create();
        Schema::enableForeignKeyConstraints();
    }
}
