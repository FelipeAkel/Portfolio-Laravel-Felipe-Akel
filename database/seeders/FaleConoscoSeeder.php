<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TbFaleConosco;

class FaleConoscoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TbFaleConosco::factory()->count(40)->create();
    }
}
