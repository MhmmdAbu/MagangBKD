<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Administrator Sistem',
                'email' => 'administrator@aplikasi.test',
                'role' => 'Administrator',
                'instansi' => 'Pemerintah Daerah',
                'alamat' => 'Kantor Bupati',
                'nomor_hp' => '081200000001',
                'password' => Hash::make('Admin123'),
            ],
            [
                'name' => 'Admin Utama',
                'email' => 'admin@aplikasi.test',
                'role' => 'Admin',
                'instansi' => 'Dinas Pendapatan',
                'alamat' => 'Kantor Pajak',
                'nomor_hp' => '081200000002',
                'password' => Hash::make('Admin123'),
            ],
            [
                'name' => 'KTU Pelayanan',
                'email' => 'ktu@aplikasi.test',
                'role' => 'KTU',
                'instansi' => 'Kantor Pelayanan',
                'alamat' => 'Ruang KTU',
                'nomor_hp' => '081200000003',
                'password' => Hash::make('Admin123'),
            ],
            [
                'name' => 'Koordinator Survey',
                'email' => 'koordinator.survey@aplikasi.test',
                'role' => 'koordinator_survey',
                'instansi' => 'Bidang Survey',
                'alamat' => 'Unit Survey',
                'nomor_hp' => '081200000004',
                'password' => Hash::make('Admin123'),
            ],
            [
                'name' => 'Surveyor Lapangan 1',
                'email' => 'surveyor1@aplikasi.test',
                'role' => 'anggota_survey',
                'instansi' => 'Bidang Survey',
                'alamat' => 'Lapangan',
                'nomor_hp' => '081200000005',
                'password' => Hash::make('Admin123'),
            ],
            [
                'name' => 'Surveyor Lapangan 2',
                'email' => 'surveyor2@aplikasi.test',
                'role' => 'anggota_survey',
                'instansi' => 'Bidang Survey',
                'alamat' => 'Lapangan',
                'nomor_hp' => '081200000006',
                'password' => Hash::make('Admin123'),
            ],
            [
                'name' => 'PPAT Contoh',
                'email' => 'ppat@aplikasi.test',
                'role' => 'PPAT',
                'instansi' => 'Kantor PPAT',
                'alamat' => 'Jl. Contoh No. 1',
                'nomor_hp' => '081200000007',
                'password' => Hash::make('Admin123'),
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                $user
            );
        }
    }
}
