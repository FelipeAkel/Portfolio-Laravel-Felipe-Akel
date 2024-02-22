<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(TipoExperienciaSeeder::class);
        $this->call(CarreiraProfissionalSeeder::class);
        $this->call(TipoHabilidadeSeeder::class);
        $this->call(HabilidadeSeeder::class);
        $this->call(ServicosSeeder::class);
        $this->call(StatusSeeder::class);
    }
}
