<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            ['name' => 'Pcs'],
            ['name' => 'Kg'],
            ['name' => 'Liter'],
            ['name' => 'Box'],
            ['name' => 'Meter'],
            ['name' => 'Pack'],
            ['name' => 'Roll'],
            ['name' => 'Set'],
            ['name' => 'Unit'],
        ];

        foreach ($units as $unit) {
            Unit::create($unit);
        }
    }
}
