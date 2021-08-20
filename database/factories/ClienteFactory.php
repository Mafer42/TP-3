<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

     /*
      $table->string('numeroIdentidad')->unique();
            $table->string('nombre');
            $table->string('telefono')->nullable();
     */
    public function definition()
    {
        return [
            //
            'numeroIdentidad' =>$this->faker->numerify('####-')
            . $this->faker->numberBetween(1950, 2005)
            . $this->faker->unique()->numerify('-#####'),
            'nombre' =>$this->faker->name(),
            'telefono' => $this->faker->phoneNumber(),

        ];
    }
}
