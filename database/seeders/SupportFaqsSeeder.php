<?php

namespace Database\Seeders;

use App\Models\SupportFaqs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupportFaqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SupportFaqs::factory(10)->create();
    }
}
