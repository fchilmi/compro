<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Filter Kolam',
            'slug' => 'Filter-Kolam',
            'color' => 'green'
        ]);
        Category::create([
            'name' => 'Filter Tanki',
            'slug' => 'Filter-Tanki',
            'color' => 'blue'
        ]);
        Category::create([
            'name' => 'Filter Cooling',
            'slug' => 'Filter-Cooling',
            'color' => 'red'
        ]);
        Category::create([
            'name' => 'Filter Air',
            'slug' => 'Filter-Air',
            'color' => 'black'
        ]);
        Category::create([
            'name' => 'Spare Part',
            'slug' => 'Spare-Part',
            'color' => 'yellow'
        ]);
    }
}
