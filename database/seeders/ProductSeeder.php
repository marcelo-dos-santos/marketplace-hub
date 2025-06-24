<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Store;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stores = Store::all();
        $categories = Category::whereNotNull('parent_id')->get();

        if ($stores->isEmpty() || $categories->isEmpty()) {
            return;
        }

        $products = [
            [
                'name' => 'iPhone 15 Pro Max 256GB',
                'description' => 'O iPhone mais avançado da Apple com chip A17 Pro, câmera tripla de 48MP e design em titânio.',
                'short_description' => 'iPhone 15 Pro Max com tecnologia de ponta',
                'price' => 8999.00,
                'compare_price' => 9999.00,
                'stock_quantity' => 15,
                'sku' => 'IPH15PM256',
                'is_featured' => true,
                'status' => 'published',
                'tags' => ['smartphone', 'apple', 'iphone', 'tecnologia'],
            ],
            [
                'name' => 'MacBook Air M2 13" 256GB',
                'description' => 'Notebook ultraportátil com chip M2 da Apple, tela Retina e até 18 horas de bateria.',
                'short_description' => 'MacBook Air com chip M2 e design elegante',
                'price' => 7499.00,
                'compare_price' => 8499.00,
                'stock_quantity' => 8,
                'sku' => 'MBA-M2-256',
                'is_featured' => true,
                'status' => 'published',
                'tags' => ['notebook', 'apple', 'macbook', 'computador'],
            ],
            [
                'name' => 'Vestido Floral Verão',
                'description' => 'Vestido elegante com estampa floral, perfeito para o verão. Tecido leve e confortável.',
                'short_description' => 'Vestido floral para o verão',
                'price' => 129.90,
                'compare_price' => 159.90,
                'stock_quantity' => 45,
                'sku' => 'VEST-FLORAL-001',
                'is_featured' => true,
                'status' => 'published',
                'tags' => ['vestido', 'feminino', 'verão', 'floral'],
            ],
            [
                'name' => 'Tênis Nike Air Max',
                'description' => 'Tênis esportivo com tecnologia Air Max, ideal para corrida e atividades físicas.',
                'short_description' => 'Tênis Nike Air Max para esportes',
                'price' => 399.90,
                'compare_price' => 499.90,
                'stock_quantity' => 32,
                'sku' => 'NIKE-AIRMAX-001',
                'is_featured' => true,
                'status' => 'published',
                'tags' => ['tênis', 'nike', 'esporte', 'corrida'],
            ],
            [
                'name' => 'Sofá 3 Lugares Moderno',
                'description' => 'Sofá moderno e confortável para 3 pessoas, tecido resistente e design contemporâneo.',
                'short_description' => 'Sofá moderno para 3 pessoas',
                'price' => 1299.00,
                'compare_price' => 1599.00,
                'stock_quantity' => 12,
                'sku' => 'SOFA-3L-001',
                'is_featured' => true,
                'status' => 'published',
                'tags' => ['sofá', 'móveis', 'sala', 'conforto'],
            ],
            [
                'name' => 'Livro: O Poder do Hábito',
                'description' => 'Best-seller sobre como transformar hábitos e melhorar sua vida pessoal e profissional.',
                'short_description' => 'Livro sobre transformação de hábitos',
                'price' => 39.90,
                'compare_price' => 49.90,
                'stock_quantity' => 67,
                'sku' => 'LIV-PODER-HABITO',
                'is_featured' => true,
                'status' => 'published',
                'tags' => ['livro', 'desenvolvimento', 'hábitos', 'motivação'],
            ],
            [
                'name' => 'Kit Maquiagem Profissional',
                'description' => 'Kit completo de maquiagem com paleta de sombras, batons, base e pincéis profissionais.',
                'short_description' => 'Kit completo de maquiagem',
                'price' => 199.90,
                'compare_price' => 299.90,
                'stock_quantity' => 28,
                'sku' => 'MAQ-KIT-PRO',
                'is_featured' => true,
                'status' => 'published',
                'tags' => ['maquiagem', 'beleza', 'kit', 'profissional'],
            ],
            [
                'name' => 'Bicicleta Mountain Bike',
                'description' => 'Bicicleta para trilhas e aventuras, com 21 marchas e quadro resistente em alumínio.',
                'short_description' => 'Bicicleta para trilhas e aventuras',
                'price' => 899.00,
                'compare_price' => 1199.00,
                'stock_quantity' => 18,
                'sku' => 'BIKE-MTB-001',
                'is_featured' => true,
                'status' => 'published',
                'tags' => ['bicicleta', 'esporte', 'trilha', 'aventura'],
            ],
        ];

        foreach ($products as $productData) {
            $store = $stores->random();
            $category = $categories->random();

            Product::create([
                'store_id' => $store->id,
                'category_id' => $category->id,
                'name' => $productData['name'],
                'slug' => Str::slug($productData['name']),
                'description' => $productData['description'],
                'short_description' => $productData['short_description'],
                'price' => $productData['price'],
                'compare_price' => $productData['compare_price'],
                'stock_quantity' => $productData['stock_quantity'],
                'sku' => $productData['sku'],
                'tags' => $productData['tags'],
                'status' => $productData['status'],
                'is_featured' => $productData['is_featured'],
                'is_active' => true,
                'requires_shipping' => true,
                'is_digital' => false,
                'views_count' => rand(10, 500),
                'rating_average' => rand(35, 50) / 10, // 3.5 a 5.0
                'rating_count' => rand(5, 150),
            ]);
        }
    }
}
