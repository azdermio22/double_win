<?php

namespace Database\Seeders;

use App\Models\Categori;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoris = ['abbigliamento','veicoli','gioglielli'];

        foreach ($categoris as $categori) {
            Categori::create([
                'categori' => $categori,
            ]);
        }
    }
}
