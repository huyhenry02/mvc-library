<?php

namespace Database\Seeders;

use App\Models\BookBorrowingForm;
use Illuminate\Database\Seeder;

class BookBorrowingFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/json/book_borrowing_forms.json'));
        $data = json_decode($json);

        foreach ($data as $item) {

            BookBorrowingForm::create([
                'create_user_id' => $item->create_user_id,
                'customer_name' => $item->customer_name,
                'customer_phone' => $item->customer_phone,
                'customer_email' => $item->customer_email,
                'customer_address' => $item->customer_address,
                'usage_period_from' => $item->usage_period_from,
                'usage_period_to' => $item->usage_period_to,
                'deposit' => $item->deposit,
                'total_price' => $item->total_price,
                'status' => $item->status,
            ]);

        }
    }
}
