<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('admin');
        $admin = new Admin();
        $admin->name = 'Admin Proyect';
        $admin->role = 'admin';
        $admin->mobile = '53553804';
        $admin->email = 'admin@gmail.com';
        $admin->password = $password;
        $admin->status = '1';
        $admin->save();

        $password = Hash::make('admin'); 
        $admin = new Admin();
        $admin->name = 'Developer';
        $admin->role = 'subadmin';
        $admin->mobile = '53553803';
        $admin->email = 'subadmin@gmail.com';
        $admin->password = $password;
        $admin->status = '1';
        $admin->save();

        $password = Hash::make('admin');
        $admin = new Admin();
        $admin->name = 'Programint';
        $admin->role = 'subadmin';
        $admin->mobile = '53553802';
        $admin->email = 'subadmin1@gmail.com';
        $admin->password = $password;
        $admin->status = '1';
        $admin->save();
    }
}
