<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class categorysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorys = ['veicoli','abbigliamento','gioglielli'];
        
        foreach ($categorys as $category) {
            Category::create([
                'categorys' => $category,
            ]);
        }
    }

}
