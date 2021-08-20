<?php

namespace Database\Factories;

use App\Models\Factura;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacturaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Factura::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

     /*
      $table->unsignedBigInteger('cliente_id');
       $table->date('fecha_venta');
        $table->unsignedBigInteger('producto_id');
         $table->unsignedBigInteger('precio_venta_id');
     */
    public function definition()
    {
        return [
            //
            'fecha_venta' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'cliente_id' => $this->faker->numberBetween($min = 1, $max = 200),
            'producto_id' => $this->faker->numberBetween($min = 1, $max = 200),
            'precio_venta_id' => $this->faker->numberBetween($min = 1, $max = 200),

        ];
    }
}
