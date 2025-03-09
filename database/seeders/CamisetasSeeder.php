<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CamisetasSeeder extends Seeder
{
    public function run()
    {
        DB::table('camisetas')->insert([
            [
                'nombre_equipo' => 'FC Barcelona',
                'temporada' => '2024/25',
                'marca' => 'Nike',
                'talla' => 'L',
                'precio' => 89.99,
                'stock' => 10,
                'imagen' => 'barcelona_2024.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_equipo' => 'Real Madrid',
                'temporada' => '2023/24',
                'marca' => 'Adidas',
                'talla' => 'M',
                'precio' => 99.99,
                'stock' => 15,
                'imagen' => 'real_madrid_2023.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_equipo' => 'Atlético de Madrid',
                'temporada' => '2004/05',
                'marca' => 'Nike',
                'talla' => 'S',
                'precio' => 79.99,
                'stock' => 20,
                'imagen' => 'atletico_madrid_2004.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_equipo' => 'Betis',
                'temporada' => '2021/22 Copa del Rey',
                'marca' => 'Kappa',
                'talla' => 'XL',
                'precio' => 95.00,
                'stock' => 5,
                'imagen' => 'betis_2021.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_equipo' => 'Seleccion Española',
                'temporada' => 'Mundial 2010',
                'marca' => 'Adidas',
                'talla' => 'M',
                'precio' => 89.00,
                'stock' => 8,
                'imagen' => 'spain_2010.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_equipo' => 'Juventus',
                'temporada' => '2023/24',
                'marca' => 'Adidas',
                'talla' => 'L',
                'precio' => 89.99,
                'stock' => 12,
                'imagen' => 'juventus_2023.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_equipo' => 'Seleccion Brasileña',
                'temporada' => 'Copa America 2024',
                'marca' => 'Nike',
                'talla' => 'S',
                'precio' => 95.00,
                'stock' => 18,
                'imagen' => 'brasil_2024.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_equipo' => 'Santos ',
                'temporada' => '2024/25',
                'marca' => 'Nike',
                'talla' => 'S',
                'precio' => 99.99,
                'stock' => 25,
                'imagen' => 'santos_2024.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_equipo' => 'Liverpool',
                'temporada' => '2019/20',
                'marca' => 'New Balance',
                'talla' => 'XL',
                'precio' => 90.00,
                'stock' => 10,
                'imagen' => 'liverpool_2019.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_equipo' => 'Boca Juniors',
                'temporada' => '2023/24',
                'marca' => 'Nike',
                'talla' => 'M',
                'precio' => 85.00,
                'stock' => 7,
                'imagen' => 'boca_juniors_2023.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
