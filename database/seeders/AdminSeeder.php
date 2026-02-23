<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@genyra.com'],
            [
                'name' => 'Super Admin',
                'email' => 'admin@genyra.com',
                'password' => Hash::make('2026@Admin'),
                'email_verified_at' => now(),
            ]
        );

        // executivedirector@genyragroup.com
        User::updateOrCreate(
            ['email' => 'executivedirector@genyragroup.com'],
            [
                'name' => 'Executive Director',
                'email' => 'executivedirector@genyragroup.com',
                'password' => Hash::make('2026@Executive'),
                'email_verified_at' => now(),
            ]
        );

        //  info@genyragroup.com
        User::updateOrCreate(
            ['email' => 'info@genyragroup.com'],
            [
                'name' => 'Info',
                'email' => 'info@genyragroup.com',
                'password' => Hash::make('2026@Info'),
                'email_verified_at' => now(),
            ]
        );
    }
}
