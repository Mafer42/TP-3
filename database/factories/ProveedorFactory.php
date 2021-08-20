<?php

namespace Database\Factories;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proveedor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

     /*
      $table->string('nombre_proveedor');
      $table->string('correo');
      $table->string('telefono');
      $table->string('nombre_contacto_proveedor');
     */
    public function definition()
    {
        return [
            //
            'nombre_proveedor' => $this->faker->name(),
            'correo' => $this->faker->email(),
            'telefono' => $this->faker->phoneNumber(),
            'nombre_contacto_proveedor' => $this->faker->name()
        ];
    }
}
