<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        User::create(array(
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'is_superuser' => true,
        ));
    }
}
