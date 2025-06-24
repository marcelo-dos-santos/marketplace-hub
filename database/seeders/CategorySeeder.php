<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Eletrônicos' => [
                'Smartphones',
                'Computadores',
                'Tablets',
                'Acessórios Eletrônicos',
                'Gaming'
            ],
            'Moda' => [
                'Roupas Masculinas',
                'Roupas Femininas',
                'Calçados',
                'Bolsas',
                'Acessórios Moda'
            ],
            'Casa e Jardim' => [
                'Móveis',
                'Decoração',
                'Cozinha',
                'Jardim',
                'Limpeza'
            ],
            'Esportes' => [
                'Futebol',
                'Corrida',
                'Musculação',
                'Natação',
                'Ciclismo'
            ],
            'Livros' => [
                'Ficção',
                'Não-Ficção',
                'Técnicos',
                'Infantil',
                'Acadêmicos'
            ],
            'Beleza' => [
                'Maquiagem',
                'Skincare',
                'Perfumes',
                'Cabelo',
                'Unhas'
            ],
            'Automotivo' => [
                'Peças',
                'Acessórios Automotivos',
                'Manutenção',
                'Segurança',
                'Conforto'
            ],
            'Brinquedos' => [
                'Educativos',
                'Brinquedos Eletrônicos',
                'Pelúcias',
                'Jogos de Mesa',
                'Arte e Criatividade'
            ]
        ];

        foreach ($categories as $mainCategory => $subCategories) {
            $parent = Category::create([
                'name' => $mainCategory,
                'slug' => Str::slug($mainCategory),
                'description' => "Produtos da categoria {$mainCategory}",
                'is_active' => true,
                'is_featured' => rand(0, 1),
                'sort_order' => rand(1, 100),
            ]);

            foreach ($subCategories as $subCategory) {
                Category::create([
                    'name' => $subCategory,
                    'slug' => Str::slug($subCategory),
                    'description' => "Produtos da categoria {$subCategory}",
                    'parent_id' => $parent->id,
                    'is_active' => true,
                    'is_featured' => rand(0, 1),
                    'sort_order' => rand(1, 100),
                ]);
            }
        }
    }
}
