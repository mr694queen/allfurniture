<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CompanyFeature;

class CompanyFeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            ['icon' => 'truck-moving', 'title' => 'Kirim ke Mana saja', 'description' => 'Layanan pengiriman ke seluruh Indonesia dengan paket yang aman dan terpercaya'],


            ['icon' => 'palette', 'title' => 'Desain Custom', 'description' => 'Furniture dibuat sesuai desain dan spesifikasi yang Anda inginkan'],


            ['icon' => 'search', 'title' => 'Pencarian Mudah', 'description' => 'Temukan furniture ideal dengan filter kategori dan pencarian yang cepat'],


            ['icon' => 'headphones', 'title' => 'Konsultasi Gratis', 'description' => 'Tim desain siap membantu konsultasi kebutuhan furniture Anda'],


            ['icon' => 'shield-check', 'title' => 'Kualitas Terjamin', 'description' => 'Semua produk teruji kualitas dan finishing yang sempurna'],


            ['icon' => 'users', 'title' => 'Banyak Pilihan', 'description' => 'Jutaan pilihan furniture untuk rumah dan sekolah dengan variasi desain yang luas'],


            ['icon' => 'handshake', 'title' => 'Jasa Pasang Profesional', 'description' => 'Tim instalasi terlatih memastikan furniture dipasang dengan benar dan rapi'],


            ['icon' => 'lightbulb', 'title' => 'Garansi Produk', 'description' => 'Produk memiliki garansi kualitas dan finishing untuk jangka panjang'],


            ['icon' => 'headset', 'title' => 'Support 24/7', 'description' => 'Tim customer service siap membantu Anda kapan saja'],


            ['icon' => 'folder', 'title' => 'Organisir dengan Elegan', 'description' => 'Solusi penyimpanan yang fungsional untuk mengoptimalkan ruang Anda'],


            ['icon' => 'book-open', 'title' => 'Konsultasi Desain', 'description' => 'Tim desain siap membantu merancang ruang Anda dengan furniture yang tepat'],


            ['icon' => 'pallet', 'title' => 'Harga Kompetitif', 'description' => 'Kualitas premium dengan harga yang bersaing dan transparan'],


            ['icon' => 'calendar', 'title' => 'Tempo Pengiriman', 'description' => 'Waktu pengiriman yang dapat diandalkan sesuai jadwal yang disepakati'],


            ['icon' => 'hand-pointer', 'title' => 'Panduan Pilihan', 'description' => 'Bantuan untuk memilih furniture yang tepat sesuai ruang dan kebutuhan Anda'],


            ['icon' => 'check-circle', 'title' => 'Satisfaction Guaranteed', 'description' => 'Kepuasan pelanggan adalah prioritas utama dalam setiap transaksi'],


            ['icon' => 'layers', 'title' => 'Rumah & Sekolah', 'description' => 'Furniture yang dirancang khusus untuk kedua segmen, rumah dan sekolah'],


            ['icon' => 'briefcase', 'title' => 'Pelayanan Pribadi', 'description' => 'Pelayanan khusus dan terpercaya untuk setiap pelanggan'],


            ['icon' => 'clipboard-check', 'title' => 'Pemesanan Mudah', 'description' => 'Proses pemesanan yang mudah dari konsultasi hingga pengiriman'],


            ['icon' => 'exclamation-triangle', 'title' => 'Konfirmasi Dini', 'description' => 'Konfirmasi pesanan dan estimasi waktu produksi segera setelah pembayaran diterima'],


            ['icon' => 'package', 'title' => 'Pengiriman Langsung', 'description' => 'Barang dikirim langsung dari workshop ke lokasi pemasangan Anda'],


            ['icon' => 'activity', 'title' => 'Berbagai Variasi', 'description' => 'Warna, material, dan ukuran yang dapat disesuaikan dengan kebutuhan Anda'],
        ];

        foreach ($features as $feature) {
            CompanyFeature::updateOrCreate(
                ['icon' => $feature['icon']],
                $feature
            );
        }
    }
}
