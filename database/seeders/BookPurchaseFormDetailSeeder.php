<?php

namespace Database\Seeders;

use App\Models\BookPurchaseFormDetails;
use Illuminate\Database\Seeder;

class BookPurchaseFormDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/json/book_purchase_form_details.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            BookPurchaseFormDetails::create([
                'book_purchase_form_id' => $item->book_purchase_form_id,
                'book_id' => $item->book_id,
                'amount' => $item->amount,
                'price' => $item->price,
            ]);
        }
    }
}
