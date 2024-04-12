<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/json/categories.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            Category::create([
                'name' => $item->name,
                'description' => $item->description,
            ]);
        }
    }
}
