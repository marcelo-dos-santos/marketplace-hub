<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informações Pessoais') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Atualize as informações básicas da sua conta.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <x-input-label for="name" :value="__('Nome Completo')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" placeholder="Seu nome completo" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" placeholder="seu@email.com" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-2">
                        <p class="text-sm text-gray-800">
                            {{ __('Seu email não foi verificado.') }}

                            <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Clique aqui para reenviar o email de verificação.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('Um novo link de verificação foi enviado para seu email.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <x-input-label for="phone" :value="__('Telefone')" />
                <x-text-input id="phone" name="phone" type="tel" class="mt-1 block w-full" :value="old('phone', $user->phone)" placeholder="(11) 99999-9999" />
                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div>

            <div>
                <x-input-label for="role" :value="__('Tipo de Conta')" />
                <select id="role" name="role" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" disabled>
                    <option value="customer" {{ $user->role === 'customer' ? 'selected' : '' }}>Cliente</option>
                    <option value="seller" {{ $user->role === 'seller' ? 'selected' : '' }}>Vendedor</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrador</option>
                </select>
                <p class="mt-1 text-sm text-gray-500">Para alterar o tipo de conta, entre em contato com o suporte.</p>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Salvar Alterações') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Salvo!') }}</p>
            @endif
        </div>
    </form>

    <script>
        // Máscara para formatação do telefone
        document.addEventListener('DOMContentLoaded', function() {
            const phoneInput = document.getElementById('phone');
            
            // Função para formatar o telefone
            function formatPhone(value) {
                // Remove tudo que não é dígito
                const numbers = value.replace(/\D/g, '');
                
                // Aplica a máscara (XX) XXXXX-XXXX
                if (numbers.length === 0) {
                    return '';
                } else if (numbers.length <= 2) {
                    return `(${numbers}`;
                } else if (numbers.length <= 7) {
                    return `(${numbers.slice(0, 2)}) ${numbers.slice(2)}`;
                } else if (numbers.length <= 11) {
                    return `(${numbers.slice(0, 2)}) ${numbers.slice(2, 7)}-${numbers.slice(7)}`;
                } else {
                    return `(${numbers.slice(0, 2)}) ${numbers.slice(2, 7)}-${numbers.slice(7, 11)}`;
                }
            }
            
            // Aplica a formatação quando o usuário digita
            phoneInput.addEventListener('input', function(e) {
                const oldValue = e.target.value;
                const newValue = formatPhone(oldValue);
                
                // Só atualiza se o valor realmente mudou
                if (oldValue !== newValue) {
                    e.target.value = newValue;
                    
                    // Calcula a nova posição do cursor
                    const numbers = newValue.replace(/\D/g, '');
                    let newCursorPosition;
                    
                    if (numbers.length <= 2) {
                        // Cursor após o último número digitado
                        newCursorPosition = numbers.length + 1; // +1 para o parêntese
                    } else if (numbers.length <= 7) {
                        // Cursor após o espaço
                        newCursorPosition = numbers.length + 3; // +3 para (XX) 
                    } else {
                        // Cursor após o hífen
                        newCursorPosition = numbers.length + 4; // +4 para (XX) XXXX-
                    }
                    
                    // Define a nova posição do cursor
                    e.target.setSelectionRange(newCursorPosition, newCursorPosition);
                }
            });
            
            // Formata o valor inicial se existir
            if (phoneInput.value) {
                phoneInput.value = formatPhone(phoneInput.value);
            }
        });
    </script>
    </form>
</section>
