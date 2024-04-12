<?php

namespace Database\Seeders;

use App\Models\BookPurchaseForm;
use Illuminate\Database\Seeder;

class BookPurchaseFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/json/book_purchase_forms.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            BookPurchaseForm::create([
                'create_user_id' => $item->create_user_id,
                'customer_name' => $item->customer_name,
                'customer_phone' => $item->customer_phone,
                'customer_email' => $item->customer_email,
                'customer_address' => $item->customer_address,
                'total_price' => $item->total_price,
            ]);

        }
    }
}
