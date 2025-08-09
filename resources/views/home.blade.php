<x-app-layout>
        <!-- Hero Section -->
        <section class="bg-gradient-to-r from-blue-600 to-purple-700 text-white">
            <div class="w-full px-8 py-24">
                <div class="text-center">
                    <h1 class="text-4xl md:text-6xl font-bold mb-6">
                        Descubra Produtos Incríveis
                    </h1>
                    <p class="text-xl md:text-2xl mb-8 text-blue-100">
                        Conectamos você aos melhores vendedores do Brasil
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="#" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                            Comprar Agora
                        </a>
                        <a href="#" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition duration-300">
                            Seja um Vendedor
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Categories Section -->
        @if($featuredCategories->count() > 0)
        <section class="py-16 bg-white">
            <div class="w-full px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Categorias em Destaque</h2>
                    <p class="text-lg text-gray-600">Explore nossas categorias mais populares</p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                    @foreach($featuredCategories as $category)
                    <a href="#" class="group">
                        <div class="bg-gray-50 rounded-lg p-6 text-center hover:bg-blue-50 transition duration-300">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-200">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-900 group-hover:text-blue-600">{{ $category->name }}</h3>
                            <p class="text-sm text-gray-500 mt-1">{{ $category->products_count ?? 0 }} produtos</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <!-- Featured Products -->
        @if($featuredProducts->count() > 0)
        <section class="py-16 bg-gray-50">
            <div class="w-full px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Produtos em Destaque</h2>
                    <p class="text-lg text-gray-600">Os produtos mais vendidos e bem avaliados</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" style="padding:85px;">
                    @foreach($featuredProducts as $product)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <div class="aspect-w-1 aspect-h-1 bg-gray-200">
                            @if($product->primaryImageUrl)
                            <img src="{{ $product->primaryImageUrl }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                            @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            @endif
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 mb-2 line-clamp-2">{{ $product->name }}</h3>
                            <p class="text-sm text-gray-500 mb-2">{{ $product->store->name }}</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    @if($product->rating_average > 0)
                                    <div class="flex items-center">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <=$product->rating_average)
                                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                            @else
                                            <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                            @endif
                                            @endfor
                                            <span class="text-sm text-gray-500 ml-1">({{ $product->rating_count }})</span>
                                    </div>
                                    @endif
                                </div>
                                <div class="text-right">
                                    <p class="text-lg font-bold text-blue-600">R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                                    @if($product->hasDiscount())
                                    <p class="text-sm text-gray-500 line-through">R$ {{ number_format($product->compare_price, 2, ',', '.') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="text-center mt-8">
                    <a href="#" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                        Ver Todos os Produtos
                        <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </section>
        @endif

        <!-- Featured Stores -->
        @if($featuredStores->count() > 0)
        <section class="py-16 bg-white">
            <div class="w-full px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Lojas em Destaque</h2>
                    <p class="text-lg text-gray-600">Conheça nossos vendedores mais bem avaliados</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($featuredStores as $store)
                    <div class="bg-gray-50 rounded-lg p-6 text-center hover:bg-blue-50 transition duration-300">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            @if($store->logo)
                            <img src="{{ $store->logo }}" alt="{{ $store->name }}" class="w-12 h-12 rounded-full object-cover">
                            @else
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            @endif
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-2">{{ $store->name }}</h3>
                        <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{ $store->description }}</p>
                        <div class="flex justify-center space-x-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                {{ $store->total_products }} produtos
                            </span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $store->total_orders }} vendas
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <!-- CTA Section -->
        <section class="py-16 bg-blue-600">
            <div class="w-full px-8 text-center">
                <h2 class="text-3xl font-bold text-white mb-4">Pronto para começar?</h2>
                <p class="text-xl text-blue-100 mb-8">Junte-se a milhares de vendedores e compradores</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                        Criar Conta Grátis
                    </a>
                    <a href="#" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition duration-300">
                        Saiba Mais
                    </a>
                </div>
            </div>
        </section>
</x-app-layout>