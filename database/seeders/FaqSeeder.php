<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question'   => 'Apakah tersedia furniture untuk rumah dan sekolah?',
                'answer'     => 'Ya, kami menyediakan furniture untuk kedua segmen dengan desain yang sesuai kebutuhan masing-masing. Untuk rumah kami menyediakan furniture ruang tamu, kamar tidur, ruang makan, dan lainnya. Untuk sekolah tersedia meja, kursi, lemari, dan furniture kelas yang ergonomis.',
                'sort_order' => 1,
                'is_active'  => true,
            ],
            [
                'question'   => 'Apakah bisa memesan furniture custom?',
                'answer'     => 'Tentu saja. Kami menawarkan layanan furniture custom sesuai desain, ukuran, warna, dan material yang Anda inginkan. Tim desainer kami siap membantu dari tahap konsultasi hingga produksi selesai.',
                'sort_order' => 2,
                'is_active'  => true,
            ],
            [
                'question'   => 'Bagaimana cara meminta penawaran harga?',
                'answer'     => 'Anda bisa menghubungi kami melalui WhatsApp atau mengisi formulir kontak di website. Sertakan informasi jenis furniture, ukuran ruangan, dan kebutuhan khusus. Tim kami akan merespons dan memberikan penawaran harga dalam 1x24 jam.',
                'sort_order' => 3,
                'is_active'  => true,
            ],
            [
                'question'   => 'Apakah tersedia layanan pengiriman dan pemasangan?',
                'answer'     => 'Ya, kami menawarkan layanan pengiriman ke seluruh Indonesia dengan pengemasan yang aman. Tersedia juga jasa pemasangan oleh tim profesional kami yang berpengalaman, sehingga furniture terpasang dengan rapi dan tepat.',
                'sort_order' => 4,
                'is_active'  => true,
            ],
            [
                'question'   => 'Berapa lama waktu produksi furniture?',
                'answer'     => 'Waktu produksi tergantung pada jenis dan kompleksitas furniture. Untuk produk standar biasanya 7-14 hari kerja. Untuk furniture custom, estimasi akan diberikan setelah konsultasi desain dan konfirmasi pesanan.',
                'sort_order' => 5,
                'is_active'  => true,
            ],
            [
                'question'   => 'Apakah ada garansi untuk produk ALL FURNITURE?',
                'answer'     => 'Ya, semua produk kami dilengkapi garansi kualitas material dan finishing. Jika terdapat kerusakan akibat cacat produksi dalam periode garansi, kami akan melakukan perbaikan atau penggantian tanpa biaya tambahan.',
                'sort_order' => 6,
                'is_active'  => true,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(['question' => $faq['question']], $faq);
        }
    }
}
