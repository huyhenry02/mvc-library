<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/json/books.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            Book::create([
                'name' => $item->name,
                'description' => $item->description,
                'category_id' => $item->category_id,
                'author_id' => $item->author_id,
                'amount' => $item->amount,
                'rental_price' => $item->rental_price,
                'purchase_price' => $item->purchase_price,
            ]);
        }
    }
}
