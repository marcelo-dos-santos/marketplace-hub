<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Str;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stores = [
            [
                'user_email' => 'joao@loja.com',
                'name' => 'TechStore',
                'description' => 'Loja especializada em produtos de tecnologia e eletrônicos',
                'business_type' => 'company',
                'tax_id' => '12.345.678/0001-90',
                'phone' => '(11) 88888-8888',
                'address' => 'Rua da Tecnologia, 123',
                'city' => 'São Paulo',
                'state' => 'SP',
                'zip_code' => '01234-567',
                'country' => 'Brasil',
                'website' => 'https://techstore.com.br',
                'social_media' => [
                    'instagram' => '@techstore',
                    'facebook' => 'techstore',
                    'twitter' => '@techstore'
                ],
                'commission_rate' => 12.5,
                'is_featured' => true,
            ],
            [
                'user_email' => 'maria@loja.com',
                'name' => 'Fashion Boutique',
                'description' => 'Loja de moda feminina com as últimas tendências',
                'business_type' => 'individual',
                'tax_id' => '123.456.789-00',
                'phone' => '(11) 77777-7777',
                'address' => 'Av. da Moda, 456',
                'city' => 'Rio de Janeiro',
                'state' => 'RJ',
                'zip_code' => '20000-123',
                'country' => 'Brasil',
                'website' => 'https://fashionboutique.com.br',
                'social_media' => [
                    'instagram' => '@fashionboutique',
                    'facebook' => 'fashionboutique',
                    'pinterest' => 'fashionboutique'
                ],
                'commission_rate' => 10.0,
                'is_featured' => false,
            ]
        ];

        foreach ($stores as $storeData) {
            $user = User::where('email', $storeData['user_email'])->first();

            if ($user) {
                Store::create([
                    'user_id' => $user->id,
                    'name' => $storeData['name'],
                    'slug' => Str::slug($storeData['name']),
                    'description' => $storeData['description'],
                    'business_type' => $storeData['business_type'],
                    'tax_id' => $storeData['tax_id'],
                    'phone' => $storeData['phone'],
                    'address' => $storeData['address'],
                    'city' => $storeData['city'],
                    'state' => $storeData['state'],
                    'zip_code' => $storeData['zip_code'],
                    'country' => $storeData['country'],
                    'website' => $storeData['website'],
                    'social_media' => $storeData['social_media'],
                    'status' => 'approved',
                    'commission_rate' => $storeData['commission_rate'],
                    'is_featured' => $storeData['is_featured'],
                    'is_active' => true,
                ]);
            }
        }
    }
}
