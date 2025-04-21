<?php

namespace Database\Seeders;

use App\Models\Backend\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::Create([
            'name' => 'SuperAdmin',
            'email' => 'SuperAdmin@example.com',
            'password' => Hash::make('SuperAdmin@$%#^'),
            'role' => 'SuperAdmin',
        ]);
    }
}
