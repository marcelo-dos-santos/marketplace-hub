<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Ações da Conta') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Gerencie as configurações da sua conta e notificações.') }}
        </p>
    </header>

    <div class="mt-6 space-y-6">
        <!-- Email Verification -->
        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-yellow-800">
                            {{ __('Email não verificado') }}
                        </h3>
                        <div class="mt-2 text-sm text-yellow-700">
                            <p>
                                {{ __('Seu endereço de email não foi verificado.') }}
                                <form id="send-verification" method="post" action="{{ route('verification.send') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="underline text-yellow-800 hover:text-yellow-600">
                                        {{ __('Clique aqui para reenviar o email de verificação.') }}
                                    </button>
                                </form>
                            </p>
                        </div>
                        @if (session('status') === 'verification-link-sent')
                            <div class="mt-2 text-sm text-green-600">
                                {{ __('Um novo link de verificação foi enviado para seu email.') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @else
            <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-green-800">
                            {{ __('Email verificado') }}
                        </h3>
                        <p class="mt-1 text-sm text-green-700">
                            {{ __('Seu email foi verificado com sucesso em') }} {{ $user?->email_verified_at?->format('d/m/Y H:i') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Account Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 text-center">
                <div class="text-2xl font-bold text-blue-600">{{ $user->orders->count() }}</div>
                <div class="text-sm text-blue-800">Pedidos</div>
            </div>
            
            <div class="bg-green-50 border border-green-200 rounded-lg p-4 text-center">
                <div class="text-2xl font-bold text-green-600">{{ $user->reviews->count() }}</div>
                <div class="text-sm text-green-800">Avaliações</div>
            </div>
            
            @if($user->store)
            <div class="bg-purple-50 border border-purple-200 rounded-lg p-4 text-center">
                <div class="text-2xl font-bold text-purple-600">{{ $user->store->products->count() }}</div>
                <div class="text-sm text-purple-800">Produtos</div>
            </div>
            @endif
        </div>

        <!-- Store Application Status -->
        @if($user->sellerApplication)
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-medium text-gray-800">
                            {{ __('Status da Aplicação de Vendedor') }}
                        </h3>
                        <p class="text-sm text-gray-600 mt-1">
                            @if($user->sellerApplication->status === 'pending')
                                {{ __('Sua aplicação está sendo analisada.') }}
                            @elseif($user->sellerApplication->status === 'approved')
                                {{ __('Parabéns! Sua aplicação foi aprovada.') }}
                            @elseif($user->sellerApplication->status === 'rejected')
                                {{ __('Sua aplicação foi rejeitada.') }}
                            @endif
                        </p>
                    </div>
                    <div>
                        @if($user->sellerApplication->status === 'pending')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                {{ __('Pendente') }}
                            </span>
                        @elseif($user->sellerApplication->status === 'approved')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                {{ __('Aprovada') }}
                            </span>
                        @elseif($user->sellerApplication->status === 'rejected')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                {{ __('Rejeitada') }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        @endif

        <!-- Become a Seller -->
        @if(!$user->isSeller() && !$user->sellerApplication)
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-medium text-blue-800">
                            {{ __('Seja um Vendedor') }}
                        </h3>
                        <p class="text-sm text-blue-700 mt-1">
                            {{ __('Quer vender seus produtos? Aplique para se tornar um vendedor!') }}
                        </p>
                    </div>
                    <a href="{{ route('seller.apply') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        {{ __('Aplicar') }}
                    </a>
                </div>
            </div>
        @endif
    </div>
</section>
