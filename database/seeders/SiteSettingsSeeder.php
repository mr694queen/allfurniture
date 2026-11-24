<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // General
            ['key' => 'site_name', 'value' => 'ALL FURNITURE', 'type' => 'text', 'group' => 'general', 'label' => 'Nama Situs', 'sort_order' => 1],
            ['key' => 'site_tagline', 'value' => 'Furniture Berkualitas untuk Rumah dan Ruang Belajar', 'type' => 'text', 'group' => 'general', 'label' => 'Tagline', 'sort_order' => 2],
            ['key' => 'site_description', 'value' => 'Menyediakan furniture premium untuk rumah, sekolah, dan kantor dengan kualitas terbaik dan harga terjangkau.', 'type' => 'textarea', 'group' => 'general', 'label' => 'Deskripsi Situs', 'sort_order' => 3],
            ['key' => 'site_logo', 'value' => '', 'type' => 'image', 'group' => 'general', 'label' => 'Logo', 'sort_order' => 4],
            ['key' => 'site_favicon', 'value' => '', 'type' => 'image', 'group' => 'general', 'label' => 'Favicon', 'sort_order' => 5],

            // Contact
            ['key' => 'contact_whatsapp', 'value' => '628123456789', 'type' => 'text', 'group' => 'contact', 'label' => 'Nomor WhatsApp', 'sort_order' => 1],
            ['key' => 'contact_email', 'value' => 'info@allfurniture.com', 'type' => 'email', 'group' => 'contact', 'label' => 'Email', 'sort_order' => 2],
            ['key' => 'contact_address', 'value' => 'Jl. Raya No. 123, Jakarta Selatan', 'type' => 'textarea', 'group' => 'contact', 'label' => 'Alamat', 'sort_order' => 3],
            ['key' => 'contact_hours', 'value' => 'Senin - Sabtu: 08:00 - 17:00', 'type' => 'text', 'group' => 'contact', 'label' => 'Jam Operasional', 'sort_order' => 4],
            ['key' => 'contact_maps_embed', 'value' => '', 'type' => 'textarea', 'group' => 'contact', 'label' => 'Google Maps Embed URL', 'sort_order' => 5],

            // Theme
            ['key' => 'theme_primary_color', 'value' => '#B89578', 'type' => 'color', 'group' => 'theme', 'label' => 'Warna Utama', 'sort_order' => 1],
            ['key' => 'theme_secondary_color', 'value' => '#C6A487', 'type' => 'color', 'group' => 'theme', 'label' => 'Warna Sekunder', 'sort_order' => 2],
            ['key' => 'theme_accent_color', 'value' => '#9A7A61', 'type' => 'color', 'group' => 'theme', 'label' => 'Warna Aksen', 'sort_order' => 3],
            ['key' => 'theme_font_heading', 'value' => 'Playfair Display', 'type' => 'text', 'group' => 'theme', 'label' => 'Font Heading', 'sort_order' => 4],
            ['key' => 'theme_font_body', 'value' => 'Inter', 'type' => 'text', 'group' => 'theme', 'label' => 'Font Body', 'sort_order' => 5],

            // SEO
            ['key' => 'seo_title', 'value' => 'ALL FURNITURE - Furniture Berkualitas untuk Rumah dan Sekolah', 'type' => 'text', 'group' => 'seo', 'label' => 'SEO Title', 'sort_order' => 1],
            ['key' => 'seo_description', 'value' => 'ALL FURNITURE menyediakan furniture berkualitas premium untuk rumah, sekolah, dan kantor. Custom furniture, meja kursi sekolah, dan furniture ruang tamu.', 'type' => 'textarea', 'group' => 'seo', 'label' => 'Meta Description', 'sort_order' => 2],
            ['key' => 'seo_og_image', 'value' => '', 'type' => 'image', 'group' => 'seo', 'label' => 'Open Graph Image', 'sort_order' => 3],

            // Navbar
            ['key' => 'navbar_background', 'value' => '#FFFFFF', 'type' => 'color', 'group' => 'navbar', 'label' => 'Warna Background Navbar', 'sort_order' => 1],
            ['key' => 'navbar_text_color', 'value' => '#2F4F4F', 'type' => 'color', 'group' => 'navbar', 'label' => 'Warna Teks Navbar', 'sort_order' => 2],

            // Hero
            ['key' => 'hero_headline', 'value' => 'Furniture Berkualitas untuk Rumah dan Ruang Belajar', 'type' => 'text', 'group' => 'hero', 'label' => 'Headline Utama', 'sort_order' => 1],
            ['key' => 'hero_subheadline', 'value' => 'Menciptakan ruang yang nyaman, fungsional, dan estetis dengan furniture premium yang dirancang khusus untuk kebutuhan Anda.', 'type' => 'textarea', 'group' => 'hero', 'label' => 'Sub-headline', 'sort_order' => 2],
            ['key' => 'hero_cta_primary_text', 'value' => 'Jelajahi Produk', 'type' => 'text', 'group' => 'hero', 'label' => 'Teks Tombol Utama', 'sort_order' => 3],
            ['key' => 'hero_cta_primary_link', 'value' => '#produk', 'type' => 'text', 'group' => 'hero', 'label' => 'Link Tombol Utama', 'sort_order' => 4],
            ['key' => 'hero_cta_secondary_text', 'value' => 'Konsultasi Gratis', 'type' => 'text', 'group' => 'hero', 'label' => 'Teks Tombol Sekunder', 'sort_order' => 5],
            ['key' => 'hero_cta_secondary_link', 'value' => '#kontak', 'type' => 'text', 'group' => 'hero', 'label' => 'Link Tombol Sekunder', 'sort_order' => 6],
            ['key' => 'hero_image_desktop', 'value' => '', 'type' => 'image', 'group' => 'hero', 'label' => 'Gambar Desktop', 'sort_order' => 7],
            ['key' => 'hero_image_mobile', 'value' => '', 'type' => 'image', 'group' => 'hero', 'label' => 'Gambar Mobile', 'sort_order' => 8],
            ['key' => 'hero_image_position', 'value' => 'right', 'type' => 'select', 'group' => 'hero', 'label' => 'Posisi Gambar', 'sort_order' => 9, 'description' => 'left, center, right'],

            // About
            ['key' => 'about_title', 'value' => 'Tentang Kami', 'type' => 'text', 'group' => 'about', 'label' => 'Judul Section', 'sort_order' => 1],
            ['key' => 'about_story', 'value' => 'ALL FURNITURE didirikan dengan visi untuk menyediakan furniture berkualitas tinggi yang mengutamakan kenyamanan, fungsionalitas, dan estetika.', 'type' => 'textarea', 'group' => 'about', 'label' => 'Cerita Perusahaan', 'sort_order' => 2],
            ['key' => 'about_vision', 'value' => 'Menjadi penyedia furniture terpercaya nomor satu di Indonesia untuk segmen rumah, sekolah, dan kantor.', 'type' => 'textarea', 'group' => 'about', 'label' => 'Visi', 'sort_order' => 3],
            ['key' => 'about_mission', 'value' => 'Memberikan solusi furniture berkualitas dengan desain fungsional, material terbaik, dan layanan pelanggan yang prima.', 'type' => 'textarea', 'group' => 'about', 'label' => 'Misi', 'sort_order' => 4],
            ['key' => 'about_image', 'value' => '', 'type' => 'image', 'group' => 'about', 'label' => 'Gambar Workshop/Showroom', 'sort_order' => 5],

            // Stats
            ['key' => 'stat_1_label', 'value' => 'Proyek Selesai', 'type' => 'text', 'group' => 'stats', 'label' => 'Statistik 1 Label', 'sort_order' => 1],
            ['key' => 'stat_1_value', 'value' => '500+', 'type' => 'text', 'group' => 'stats', 'label' => 'Statistik 1 Nilai', 'sort_order' => 2],
            ['key' => 'stat_2_label', 'value' => 'Pelanggan Puas', 'type' => 'text', 'group' => 'stats', 'label' => 'Statistik 2 Label', 'sort_order' => 3],
            ['key' => 'stat_2_value', 'value' => '1000+', 'type' => 'text', 'group' => 'stats', 'label' => 'Statistik 2 Nilai', 'sort_order' => 4],
            ['key' => 'stat_3_label', 'value' => 'Tahun Pengalaman', 'type' => 'text', 'group' => 'stats', 'label' => 'Statistik 3 Label', 'sort_order' => 5],
            ['key' => 'stat_3_value', 'value' => '15+', 'type' => 'text', 'group' => 'stats', 'label' => 'Statistik 3 Nilai', 'sort_order' => 6],
            ['key' => 'stat_4_label', 'value' => 'Produk Tersedia', 'type' => 'text', 'group' => 'stats', 'label' => 'Statistik 4 Label', 'sort_order' => 7],
            ['key' => 'stat_4_value', 'value' => '200+', 'type' => 'text', 'group' => 'stats', 'label' => 'Statistik 4 Nilai', 'sort_order' => 8],

            // Footer
            ['key' => 'footer_description', 'value' => 'ALL FURNITURE menyediakan furniture berkualitas untuk rumah, sekolah, dan kantor dengan desain modern dan material terbaik.', 'type' => 'textarea', 'group' => 'footer', 'label' => 'Deskripsi Footer', 'sort_order' => 1],
            ['key' => 'footer_copyright', 'value' => 'ALL FURNITURE. All rights reserved.', 'type' => 'text', 'group' => 'footer', 'label' => 'Copyright Text', 'sort_order' => 2],
            ['key' => 'footer_privacy_link', 'value' => '#', 'type' => 'text', 'group' => 'footer', 'label' => 'Link Kebijakan Privasi', 'sort_order' => 3],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
