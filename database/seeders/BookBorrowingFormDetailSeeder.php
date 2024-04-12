<?php

namespace Database\Seeders;

use App\Models\BookBorrowingFormDetails;
use Illuminate\Database\Seeder;

class BookBorrowingFormDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/json/book_borrowing_form_details.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            BookBorrowingFormDetails::create([
                'book_borrowing_form_id' => $item->book_borrowing_form_id,
                'book_id' => $item->book_id,
                'amount' => $item->amount,
                'price' => $item->price,
            ]);

        }
    }
}
