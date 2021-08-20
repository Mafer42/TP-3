<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

     /*
     $table->string('nombreP');
            $table->string('categoria'); 
            $table->double('precio_compra');
            $table->double('precio_venta');
            $table->unsignedBigInteger('proveedor_id');
     */
    public function definition()
    {
        return [
            //

            'nombreP' => $this->faker->randomElement($array = array ('Aguacate','harina ','leche', 'aceite', 'queso', 'frijoles',
                                                                    'Azucar', 'cafe', 'huevos', 'bicarbonato', 'sal', 'jabon de baño',
                                                                    'cloro', 'asistin', 'arroz', 'jamon', 'pollo', 'pachicletas',
                                                                    'cereal', 'salsa de tomate', 'mantequilla', 'queso', 'pan blanco')),
            'categoria' => $this->faker->randomElement($array = array ('Lacteos','dulces','limpieza', 'granos basicos', 'esenciales de cocina',
                                                                       'pan', 'especias')),
            'precio_compra' => $this->faker->numberBetween($min = 2, $max = 50),
            'precio_venta' => $this->faker->numberBetween($min = 5, $max = 150),
            'proveedor_id' => $this->faker->numberBetween($min = 1, $max = 200),

        ];
    }
}
