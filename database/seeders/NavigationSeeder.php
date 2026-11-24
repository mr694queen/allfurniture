<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NavigationItem;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $navigationItems = [
            ['label' => 'Beranda', 'url' => '/', 'target' => '_self', 'is_active' => true, 'is_external' => false, 'sort_order' => 1],
            ['label' => 'Tentang Kami', 'url' => '/#tentang-kami', 'target' => '_self', 'is_active' => true, 'is_external' => false, 'sort_order' => 2],
            ['label' => 'Produk Unggulan', 'url' => '/#produk-unggulan', 'target' => '_self', 'is_active' => true, 'is_external' => false, 'sort_order' => 3],
            ['label' => 'Kategori Produk', 'url' => '/kategori-produk', 'target' => '_self', 'is_active' => true, 'is_external' => false, 'sort_order' => 4],
            ['label' => 'Keunggulan', 'url' => '/#keunggulan', 'target' => '_self', 'is_active' => true, 'is_external' => false, 'sort_order' => 5],
            ['label' => 'Proyek', 'url' => '/#proyek', 'target' => '_self', 'is_active' => true, 'is_external' => false, 'sort_order' => 6],
            ['label' => 'Testimoni', 'url' => '/#testimoni', 'target' => '_self', 'is_active' => true, 'is_external' => false, 'sort_order' => 7],
            ['label' => 'FAQ', 'url' => '/#faq', 'target' => '_self', 'is_active' => true, 'is_external' => false, 'sort_order' => 8],
            ['label' => 'Kontak', 'url' => '/#kontak', 'target' => '_self', 'is_active' => true, 'is_external' => false, 'sort_order' => 9],
            ['label' => 'Hubungi Kami', 'url' => 'https://wa.me/628123456789', 'target' => '_blank', 'is_active' => true, 'is_external' => true, 'sort_order' => 10],
        ];

        foreach ($navigationItems as $item) {
            NavigationItem::updateOrCreate(
                ['url' => $item['url']],
                $item
            );
        }
    }
}
