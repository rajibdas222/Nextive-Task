<?php

namespace Database\Seeders;

use App\Models\BlogCategories;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder{
    public function run(){
        BlogCategories::create(['name' => 'Category 1',]);
        BlogCategories::create(['name' => 'Category 2',]);
        BlogCategories::create(['name' => 'Category 3',]);
        BlogCategories::create(['name' => 'Category 4',]);
        BlogCategories::create(['name' => 'Category 5',]);
    }
}
