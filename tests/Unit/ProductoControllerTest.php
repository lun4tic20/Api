<?php

namespace Tests\Unit;

use App\Models\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductoControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function TestCreateProducto(){
        $data = [
            'nombre' => 'Camiseta',
            'descripcion' => 'Camiseta de algodón de manga larga',
            'precio' => 20,
            'cantidad' => 50,
            'proveedor_id' => 1
        ];

        $producto = Producto::Create($data);

        $this->assertInstanceOf(Producto::class, $producto);
        $this->assertEquals($data['nombre'], $producto->nombre);
        $this->assertEquals($data['descripcion'], $producto->descripcion);
        $this->assertEquals($data['precio'], $producto->precio);
        $this->assertEquals($data['cantidad'], $producto->cantidad);
        $this->assertEquals($data['proveedor_id'], $producto->proveedor_id);
    }

    /** @test */
    public function TestUpdateProducto(){
        $producto = Producto::factory()->create();

        $data = [
            'nombre' => 'Nueva camisa',
            'descripcion' => 'Nueva descripción de la camisa',
            'precio' => 15,
            'cantidad' => 30,
            'proveedor_id' => 5
        ];

        $producto->update($data);

        $this->assertEquals($data['nombre'], $producto->nombre);
        $this->assertEquals($data['descripcion'], $producto->descripcion);
        $this->assertEquals($data['precio'], $producto->precio);
        $this->assertEquals($data['cantidad'], $producto->cantidad);
        $this->assertEquals($data['proveedor_id'], $producto->proveedor_id);
    }

    /** @test */
    public function TestDeleteProducto(){
        $producto = Producto::factory()->create();

        $producto->delete();

        $this->assertDeleted($producto);
    }
}
