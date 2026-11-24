<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderingStep;

class OrderingStepsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $steps = [
            ['icon' => 'shopping-bag', 'title' => 'Pilih Produk', 'description' => 'Browse koleksi furniture kami dan produk favorit Anda'],


            ['icon' => 'headphones', 'title' => 'Konsultasi', 'description' => 'Hubungi tim kami untuk diskusi kebutuhan dan spesifikasi furniture'],


            ['icon' => 'pencil-ruler', 'title' => 'Rancangan', 'description' => 'Tim kami merancang dan menyiapkan desain yang sesuai dengan kebutuhan Anda'],


            ['icon' => 'handshake', 'title' => 'Konfirmasi', 'description' => 'Konfirmasi penawaran harga dan pesanan dengan tim kami'],


            ['icon' => 'factory', 'title' => 'Produksi', 'description' => 'Proses produksi furniture sesuai kesepakatan dengan waktu yang ditetapkan'],


            ['icon' => 'truck', 'title' => 'Pengiriman', 'description' => 'Pengiriman furniture ke alamat yang telah Anda tentukan'],


            ['icon' => 'tools', 'title' => 'Pemasangan', 'description' => 'Tim kami memasang furniture di ruang Anda dengan profesional'],


            ['icon' => 'check-circle', 'title' => 'Selesai', 'description' => 'Furniture selesai dipasang dan siap digunakan'],
        ];

        foreach ($steps as $step) {
            OrderingStep::updateOrCreate(
                ['step_number' => $step['step_number'] ?? 1],
                $step
            );
        }
    }
}
