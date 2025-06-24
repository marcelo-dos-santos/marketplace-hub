<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@marketplace.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '(11) 99999-9999',
            'address' => 'Rua Admin, 123',
            'city' => 'São Paulo',
            'state' => 'SP',
            'zip_code' => '01234-567',
            'country' => 'Brasil',
        ]);

        // Create seller users
        User::create([
            'name' => 'João Silva',
            'email' => 'joao@loja.com',
            'password' => Hash::make('password'),
            'role' => 'seller',
            'phone' => '(11) 88888-8888',
            'address' => 'Rua do Comércio, 456',
            'city' => 'São Paulo',
            'state' => 'SP',
            'zip_code' => '04567-890',
            'country' => 'Brasil',
        ]);

        User::create([
            'name' => 'Maria Santos',
            'email' => 'maria@loja.com',
            'password' => Hash::make('password'),
            'role' => 'seller',
            'phone' => '(11) 77777-7777',
            'address' => 'Av. das Flores, 789',
            'city' => 'Rio de Janeiro',
            'state' => 'RJ',
            'zip_code' => '20000-123',
            'country' => 'Brasil',
        ]);

        // Create customer users
        User::create([
            'name' => 'Pedro Costa',
            'email' => 'pedro@email.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'phone' => '(11) 66666-6666',
            'address' => 'Rua do Cliente, 321',
            'city' => 'São Paulo',
            'state' => 'SP',
            'zip_code' => '01234-567',
            'country' => 'Brasil',
        ]);

        User::create([
            'name' => 'Ana Oliveira',
            'email' => 'ana@email.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'phone' => '(11) 55555-5555',
            'address' => 'Av. do Consumidor, 654',
            'city' => 'Belo Horizonte',
            'state' => 'MG',
            'zip_code' => '30000-456',
            'country' => 'Brasil',
        ]);

        // Create additional customers
        User::factory(10)->create([
            'role' => 'customer'
        ]);
    }
}
