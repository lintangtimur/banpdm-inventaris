<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            // Elektronik
            ['code' => 'ITM001', 'name' => 'PC', 'category_id' => 1, 'unit_id' => 9, 'min_stock' => 2, 'location' => 'Gudang A', 'is_active' => true],
            ['code' => 'ITM002', 'name' => 'Printer', 'category_id' => 1, 'unit_id' => 9, 'min_stock' => 2, 'location' => 'Gudang A', 'is_active' => true],
            ['code' => 'ITM003', 'name' => 'Scanner', 'category_id' => 1, 'unit_id' => 9, 'min_stock' => 2, 'location' => 'Gudang A', 'is_active' => true],


            // Alat Tulis Kantor
            ['code' => 'ATK004', 'name' => 'Bolpen TTD', 'category_id' => 2, 'unit_id' => 1, 'min_stock' => 20, 'location' => 'Gudang B', 'is_active' => true],
            ['code' => 'ATK005', 'name' => 'Kertas A4', 'category_id' => 2, 'unit_id' => 6, 'min_stock' => 10, 'location' => 'Gudang B', 'is_active' => true],
            ['code' => 'ATK006', 'name' => 'Paper Clips', 'category_id' => 2, 'unit_id' => 1, 'min_stock' => 3, 'location' => 'Gudang B', 'is_active' => true],
            ['code' => 'ATK007', 'name' => 'Binder Clips', 'category_id' => 2, 'unit_id' => 6, 'min_stock' => 10, 'location' => 'Gudang B', 'is_active' => true],
            ['code' => 'ATK008', 'name' => 'Odner', 'category_id' => 2, 'unit_id' => 6, 'min_stock' => 10, 'location' => 'Gudang B', 'is_active' => true],
            ['code' => 'ATK009', 'name' => 'Map', 'category_id' => 2, 'unit_id' => 6, 'min_stock' => 10, 'location' => 'Gudang B', 'is_active' => true],
            ['code' => 'ATK010', 'name' => 'Keranjang', 'category_id' => 2, 'unit_id' => 6, 'min_stock' => 10, 'location' => 'Gudang B', 'is_active' => true],
            ['code' => 'ATK011', 'name' => 'Stabilo', 'category_id' => 2, 'unit_id' => 6, 'min_stock' => 10, 'location' => 'Gudang B', 'is_active' => true],
            ['code' => 'ATK012', 'name' => 'Gunting', 'category_id' => 2, 'unit_id' => 6, 'min_stock' => 10, 'location' => 'Gudang B', 'is_active' => true],
            ['code' => 'ATK013', 'name' => 'Lem', 'category_id' => 2, 'unit_id' => 6, 'min_stock' => 10, 'location' => 'Gudang B', 'is_active' => true],
            ['code' => 'ATK014', 'name' => 'Tempat Tisu', 'category_id' => 2, 'unit_id' => 6, 'min_stock' => 10, 'location' => 'Gudang B', 'is_active' => true],
            ['code' => 'ATK015', 'name' => 'Tinta', 'category_id' => 2, 'unit_id' => 6, 'min_stock' => 10, 'location' => 'Gudang B', 'is_active' => true],
            ['code' => 'ATK016', 'name' => 'Pembolong Kertas', 'category_id' => 2, 'unit_id' => 6, 'min_stock' => 10, 'location' => 'Gudang B', 'is_active' => true],
            ['code' => 'ATK017', 'name' => 'Staples', 'category_id' => 2, 'unit_id' => 6, 'min_stock' => 10, 'location' => 'Gudang B', 'is_active' => true],
            ['code' => 'ATK018', 'name' => 'Isi staples', 'category_id' => 2, 'unit_id' => 6, 'min_stock' => 10, 'location' => 'Gudang B', 'is_active' => true],
            ['code' => 'ATK019', 'name' => 'Sticky Notes', 'category_id' => 2, 'unit_id' => 6, 'min_stock' => 10, 'location' => 'Gudang B', 'is_active' => true],


            // Furnitur
            ['code' => 'ITM008', 'name' => 'Meja Kantor', 'category_id' => 3, 'unit_id' => 9, 'min_stock' => 1, 'location' => 'Gudang C', 'is_active' => true],
            ['code' => 'ITM009', 'name' => 'Kursi Staff', 'category_id' => 3, 'unit_id' => 9, 'min_stock' => 2, 'location' => 'Gudang C', 'is_active' => true],
            ['code' => 'ITM010', 'name' => 'Lemari Arsip', 'category_id' => 3, 'unit_id' => 9, 'min_stock' => 1, 'location' => 'Gudang C', 'is_active' => true],

            // Komputer & Aksesoris
            ['code' => 'ITM011', 'name' => 'Mouse Logitech', 'category_id' => 4, 'unit_id' => 1, 'min_stock' => 5, 'location' => 'Gudang A', 'is_active' => true],
            ['code' => 'ITM012', 'name' => 'Keyboard Logitech', 'category_id' => 4, 'unit_id' => 1, 'min_stock' => 5, 'location' => 'Gudang A', 'is_active' => true],
            ['code' => 'ITM013', 'name' => 'Monitor 24 Inch', 'category_id' => 4, 'unit_id' => 9, 'min_stock' => 2, 'location' => 'Gudang A', 'is_active' => true],

            // Kebersihan
            ['code' => 'ITM014', 'name' => 'Tisu Basah', 'category_id' => 5, 'unit_id' => 6, 'min_stock' => 10, 'location' => 'Gudang D', 'is_active' => true],
            ['code' => 'ITM015', 'name' => 'Sabun Lantai', 'category_id' => 5, 'unit_id' => 3, 'min_stock' => 5, 'location' => 'Gudang D', 'is_active' => true],
            ['code' => 'ITM016', 'name' => 'Sapu Lantai', 'category_id' => 5, 'unit_id' => 1, 'min_stock' => 2, 'location' => 'Gudang D', 'is_active' => true],
            ['code' => 'ITM017', 'name' => 'Pel Lantai', 'category_id' => 5, 'unit_id' => 1, 'min_stock' => 2, 'location' => 'Gudang D', 'is_active' => true],

            // Lainnya
            ['code' => 'ITM018', 'name' => 'Dispenser', 'category_id' => 6, 'unit_id' => 9, 'min_stock' => 1, 'location' => 'Gudang E', 'is_active' => true],
            ['code' => 'ITM019', 'name' => 'Kipas Angin', 'category_id' => 6, 'unit_id' => 9, 'min_stock' => 1, 'location' => 'Gudang E', 'is_active' => true],
            ['code' => 'ITM020', 'name' => 'Jam Dinding', 'category_id' => 6, 'unit_id' => 9, 'min_stock' => 1, 'location' => 'Gudang E', 'is_active' => true],
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
