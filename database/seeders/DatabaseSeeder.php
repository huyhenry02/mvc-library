<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AuthorSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            BookSeeder::class,
            BookPurchaseFormSeeder::class,
            BookPurchaseFormDetailSeeder::class,
            BookBorrowingFormSeeder::class,
            BookBorrowingFormDetailSeeder::class,
        ]);
    }
}
