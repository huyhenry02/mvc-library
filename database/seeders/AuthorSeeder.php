<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/json/authors.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            Author::create([
                'name' => $item->name,
                'address' => $item->address,
                'phone' => $item->phone,
                'email' => $item->email,
                'age' => $item->age,
                'workplace' => $item->workplace,
            ]);
        }
    }
}
