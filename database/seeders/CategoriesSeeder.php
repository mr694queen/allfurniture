<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Furniture Ruang Tamu', 'slug' => 'furniture-ruang-tamu', 'description' => 'Set lengkap furniture ruang tamu dengan desain premium', 'icon' => 'sofa', 'sort_order' => 1, 'is_active' => true],
            ['name' => 'Furniture Kamar Tidur', 'slug' => 'furniture-kamar-tidur', 'description' => 'Meja tidur, lemari, dan perlengkapan kamar tidur premium', 'icon' => 'bed', 'sort_order' => 2, 'is_active' => true],
            ['name' => 'Furniture Ruang Makan', 'slug' => 'furniture-ruang-makan', 'description' => 'Meja makan, kursi, dan set meja makan elegan', 'icon' => 'utensils', 'sort_order' => 3, 'is_active' => true],
            ['name' => 'Meja dan Kursi Sekolah', 'slug' => 'meja-dan-kursi-sekolah', 'description' => 'Meja dan kursi sekolah ergonomis dan tahan lama', 'icon' => 'chalkboard', 'sort_order' => 4, 'is_active' => true],
            ['name' => 'Meja Guru dan Furniture Guru', 'slug' => 'meja-guru-dan-furniture-guru', 'description' => 'Furniture khusus untuk ruang guru dan tenaga pendidikan', 'icon' => 'user-graduate', 'sort_order' => 5, 'is_active' => true],
            ['name' => 'Lemari dan Rak Penyimpanan', 'slug' => 'lemari-dan-rak-penyimpanan', 'description' => 'Lemari rak penyimpanan untuk berbagai kebutuhan ruang', 'icon' => 'drawer', 'sort_order' => 6, 'is_active' => true],
            ['name' => 'Furniture Kantor', 'slug' => 'furniture-kantor', 'description' => 'Meja kerja, rak arsip, dan furniture kantor premium', 'icon' => 'briefcase', 'sort_order' => 7, 'is_active' => true],
            ['name' => 'Furniture Custom', 'slug' => 'furniture-custom', 'description' => 'Desain furniture custom sesuai kebutuhan khusus pelanggan', 'icon' => 'palette', 'sort_order' => 8, 'is_active' => true],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
