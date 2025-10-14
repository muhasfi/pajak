<?php
// database/seeders/AccountingServiceSeeder.php

namespace Database\Seeders;

use App\Models\AccountingService;
use App\Models\AccountingServiceDetail;
use Illuminate\Database\Seeder;

class AccountingServiceSeeder extends Seeder
{
    public function run()
    {
        $service1 = AccountingService::create([
            'judul' => 'Jasa Pembukuan Lengkap',
            'harga' => 2500000.00
        ]);

        AccountingServiceDetail::create([
            'accounting_service_id' => $service1->id,
            'deskripsi' => 'Layanan pembukuan lengkap untuk usaha kecil dan menengah',
            'benefit' => [
                'Pencatatan transaksi harian',
                'Rekonsiliasi bank bulanan',
                'Laporan keuangan lengkap',
                'Analisis rasio keuangan'
            ]
        ]);

        $service2 = AccountingService::create([
            'judul' => 'Jasa Pajak Perusahaan',
            'harga' => 1500000.00
        ]);

        AccountingServiceDetail::create([
            'accounting_service_id' => $service2->id,
            'deskripsi' => 'Layanan perpajakan untuk perusahaan',
            'benefit' => [
                'Perhitungan PPh 21, 23, dan 25',
                'Pelaporan SPT Masa',
                'Konsultasi perpajakan',
                'Restitusi pajak'
            ]
        ]);
    }
}