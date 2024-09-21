<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

    public function run()
    {
        $product1 = new Product([
            'name' => "Juguete",
            'details' => "Juguete para perros",
            'price' => "2000",
            'shipping_cost' => "500",
            'description' => "Es un juguete para mejorar la inteligencia de tu perro",
            'stock' => "5",
            'category_id' => 1,
        ]);
        $product1->save();
        $file1 = new File(['route' => '/storage/images/products/default.png']);
        $product1->file()->save($file1);

        $product2 = new Product([
            'name' => "Producto de Aseo",
            'details' => "Producto de aseo para perros",
            'price' => "5000",
            'shipping_cost' => "1000",
            'description' => "Producto de aseo para bañar a tu perro ",
            'stock' => "10",
            'category_id' => 2,
        ]);
        $product2->save();
        $file2 = new File(['route' => '/storage/images/products/default.png']);
        $product2->file()->save($file2);

        $product3 = new Product([
            'name' => "Comida",
            'details' => "Comida para perros",
            'price' => "10000",
            'shipping_cost' => "2000",
            'description' => "Comida para perro adulto",
            'stock' => "20",
            'category_id' => 3,
        ]);
        $product3->save();
        $file3 = new File(['route' => '/storage/images/products/default.png']);
        $product3->file()->save($file3);
    }
}
