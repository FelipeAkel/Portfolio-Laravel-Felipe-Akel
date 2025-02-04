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
        $this->call(SobreMimSeeder::class);
        $this->call(TipoExperienciaSeeder::class);
        $this->call(CarreiraProfissionalSeeder::class);
        $this->call(TipoHabilidadeSeeder::class);
        $this->call(HabilidadeSeeder::class);
        $this->call(FuncionalidadesSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(ServicosSeeder::class);
        $this->call(PortfolioSeeder::class);
        // $this->call(FaleConoscoSeeder::class); // Dados para realização de testes
    }
}