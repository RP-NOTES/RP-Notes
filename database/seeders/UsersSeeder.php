<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = new User();
        $user1->name = "Jesús Luvian";
        $user1->email = "test@user1.com";
        $user1->password = Hash::make("123");
        $user1->save();

        $user1 = new User();
        $user1->name = "Test User";
        $user1->email = "test@user2.com";
        $user1->password = Hash::make("123");
        $user1->save();
    }
}
