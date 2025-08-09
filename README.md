# 🛍️ Marketplace Hub

> Multi-vendor e-commerce platform built with Laravel. Features seller management, integrated payments, review system, and admin dashboard with Redis caching and queue processing.

[![Laravel](https://img.shields.io/badge/Laravel-10.x-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.3+-blue.svg)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind-3.x-38B2AC.svg)](https://tailwindcss.com)
[![Vite](https://img.shields.io/badge/Vite-6.x-646CFF.svg)](https://vitejs.dev)

## 📋 Índice

- [Sobre o Projeto](#sobre-o-projeto)
- [Funcionalidades](#funcionalidades)
- [Estrutura do Banco de Dados](#estrutura-do-banco-de-dados)
- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Instalação](#instalação)
- [Uso](#uso)
- [Roadmap](#roadmap)
- [Contribuição](#contribuição)
- [Licença](#licença)

## 🎯 Sobre o Projeto

Marketplace Hub é uma plataforma de e-commerce multi-vendedor desenvolvida com Laravel, oferecendo uma solução completa para conectar vendedores e compradores. O projeto foi desenvolvido como portfolio, demonstrando habilidades em desenvolvimento web full-stack, arquitetura escalável e boas práticas de desenvolvimento.

### ✨ Características Principais

- **Multi-vendedor**: Sistema completo de gestão de vendedores e lojas
- **Pagamentos Integrados**: Suporte a Stripe e PagSeguro
- **Sistema de Reviews**: Avaliações e comentários de produtos
- **Painel Administrativo**: Dashboard completo para administradores
- **Cache com Redis**: Otimização de performance
- **Filas de Processamento**: Processamento assíncrono de tarefas

## 🚀 Funcionalidades

### 👥 Perfis de Usuário

#### **Administradores**
- Aprovação de vendedores e lojas
- Moderação de produtos e reviews
- Gestão de categorias
- Relatórios globais e analytics
- Configuração de comissões
- Suporte ao cliente

#### **Vendedores**
- Cadastro e aprovação de loja
- CRUD completo de produtos com múltiplas imagens
- Dashboard de vendas e métricas
- Gestão de pedidos e status
- Relatórios financeiros
- Sistema de comissões

#### **Compradores**
- Catálogo com filtros avançados
- Carrinho multi-vendedor
- Checkout unificado
- Histórico de pedidos
- Sistema de reviews e avaliações
- Wishlist de produtos

## 🗄️ Estrutura do Banco de Dados

### Principais Tabelas

```sql
-- Usuários (admin, seller, customer)
users (id, name, email, password, role, phone, address, city, state, zip_code, country)

-- Lojas dos vendedores
stores (id, user_id, name, slug, description, logo, banner, status, commission_rate, is_featured)

-- Categorias hierárquicas
categories (id, name, slug, description, parent_id, sort_order, is_active, is_featured)

-- Produtos
products (id, store_id, category_id, name, slug, description, price, stock_quantity, status, is_featured)

-- Imagens dos produtos
product_images (id, product_id, image_path, alt_text, sort_order, is_primary)

-- Pedidos
orders (id, user_id, store_id, order_number, status, subtotal, total_amount, commission_amount)

-- Itens dos pedidos
order_items (id, order_id, product_id, quantity, unit_price, total_price)

-- Pagamentos
payments (id, order_id, payment_method, amount, status, payment_data)

-- Reviews
reviews (id, user_id, product_id, rating, comment, is_approved)

-- Candidaturas de vendedores
seller_applications (id, user_id, store_name, business_type, status, admin_notes)

-- Comissões
commissions (id, order_id, store_id, commission_amount, status, paid_at)
```

## 🛠️ Tecnologias Utilizadas

### Backend
- **Laravel 12.x** - Framework PHP
- **PHP 8.3+** - Linguagem de programação
- **SQLite/MySQL** - Banco de dados
- **Redis** - Cache e sessões
- **Queue** - Processamento assíncrono

### Frontend
- **Blade Templates** - Motor de templates
- **Tailwind CSS** - Framework CSS
- **Alpine.js** - JavaScript reativo
- **Vite** - Build tool

### Ferramentas
- **Laravel Breeze** - Autenticação
- **Laravel Sail** - Docker development
- **Laravel Pail** - Log viewer

## 📦 Instalação

### Pré-requisitos

- PHP 8.3+
- Composer
- Node.js 18+
- Git

### Passos para Instalação

1. **Clone o repositório**
```bash
git clone https://github.com/seu-usuario/marketplace-hub.git
cd marketplace-hub
```

2. **Instale as dependências PHP**
```bash
composer install
```

3. **Instale as dependências Node.js**
```bash
npm install
```

4. **Configure o ambiente**
```bash
cp .env.example .env
php artisan key:generate
```

5. **Configure o banco de dados**
```bash
# Para SQLite (padrão)
touch database/database.sqlite

# Para MySQL/PostgreSQL, edite .env com suas credenciais
```

6. **Execute as migrations e seeders**
```bash
php artisan migrate:fresh --seed
```

7. **Compile os assets**
```bash
npm run build
```

### 🚀 Executando o Projeto

#### Opção 1: Comandos Separados
```bash
# Terminal 1 - Servidor Laravel
php artisan serve

# Terminal 2 - Vite (desenvolvimento)
npm run dev
```

#### Opção 2: Script Customizado
```bash
npm run start
```

**Acesse:** http://localhost:8000

### 👤 Dados de Teste

- **Admin:** admin@marketplace.com / password
- **Vendedor:** joao@loja.com / password
- **Cliente:** pedro@email.com / password

## 📊 Roadmap

### ✅ Fase 1 - MVP (Concluído)
- [x] Estrutura do banco de dados
- [x] Autenticação multi-perfil
- [x] CRUD básico de produtos
- [x] Homepage moderna e responsiva
- [x] Sistema de categorias
- [x] Dashboard básico

### 🔄 Fase 2 - Funcionalidades Core (Em Desenvolvimento)
- [ ] CRUD completo de produtos
- [ ] Sistema de upload de imagens
- [ ] Carrinho de compras
- [ ] Sistema de checkout
- [ ] Gestão de pedidos
- [ ] Painel do vendedor
- [ ] Painel administrativo

### 📅 Fase 3 - Recursos Avançados
- [ ] Gateway de pagamento (Stripe/PagSeguro)
- [ ] Sistema de reviews e avaliações
- [ ] Cache com Redis
- [ ] Filas para processamento
- [ ] Relatórios e analytics
- [ ] Sistema de notificações

### 🎯 Fase 4 - Otimizações
- [ ] Performance e otimização
- [ ] Testes automatizados
- [ ] Documentação completa
- [ ] Deploy em produção
- [ ] CI/CD pipeline

## 🎨 Funcionalidades por Implementar

### 🔥 Prioridades Altas
1. **CRUD de Produtos**
   - Controllers para produtos
   - Views para listagem, criação, edição
   - Upload de múltiplas imagens
   - Validação e sanitização

2. **Autenticação Multi-perfil**
   - Middleware para diferentes roles
   - Redirecionamento baseado em perfil
   - Proteção de rotas

3. **Painéis Iniciais**
   - Dashboard do admin
   - Dashboard do vendedor
   - Dashboard do cliente

### 📝 TODO List

#### Backend
- [ ] Implementar middleware de autorização por perfil
- [ ] Criar controllers para produtos (CRUD completo)
- [ ] Implementar upload de imagens para produtos
- [ ] Criar sistema de carrinho de compras
- [ ] Implementar checkout e processamento de pedidos
- [ ] Criar sistema de reviews e avaliações
- [ ] Implementar gateway de pagamento
- [ ] Configurar cache com Redis
- [ ] Implementar filas para processamento assíncrono
- [ ] Criar sistema de notificações
- [ ] Implementar relatórios e analytics

#### Frontend
- [ ] Página de catálogo com filtros
- [ ] Página de detalhes do produto
- [ ] Sistema de carrinho de compras
- [ ] Página de checkout
- [ ] Dashboard do vendedor
- [ ] Dashboard administrativo
- [ ] Página de perfil do usuário
- [ ] Sistema de reviews na interface
- [ ] Wishlist de produtos

#### DevOps
- [ ] Configurar ambiente Docker
- [ ] Implementar testes automatizados
- [ ] Configurar CI/CD pipeline
- [ ] Documentação da API
- [ ] Deploy em produção

## 🤝 Contribuição

1. Fork o projeto
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 👨‍💻 Autor

**Marcelo dos Santos** - [marcelinho.cost@gmail.com](mailto:marcelinho.cost@gmail.com)

LinkedIn: [Marcelo dos Santos](https://linkedin.com/in/marcelo-dos-santos-4362ba218/)

---

⭐ Se este projeto te ajudou, deixe uma estrela!
