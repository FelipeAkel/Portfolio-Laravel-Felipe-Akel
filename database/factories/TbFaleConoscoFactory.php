<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TbFaleConosco;

class TbFaleConoscoFactory extends Factory
{
    protected $model = TbFaleConosco::class;
    
    public function definition()
    {
        return [
            'id_status' => $this->faker->numberBetween(1, 5),
            'no_contato' => $this->faker->name(),
            'ds_email' => $this->faker->safeEmail(),
            'ds_assunto' => $this->faker->title(),
            'ds_mensagem' => $this->faker->paragraph(),
        ];
    }
}
