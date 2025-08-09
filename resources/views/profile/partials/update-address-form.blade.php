<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informações de Endereço') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Atualize seu endereço de entrega e informações de localização.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.address.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <x-input-label for="zip_code" :value="__('CEP')" />
                <x-text-input id="zip_code" name="zip_code" type="text" class="mt-1 block w-full" :value="old('zip_code', $user->zip_code)" placeholder="24800-000" />
                <x-input-error class="mt-2" :messages="$errors->get('zip_code')" />
            </div>
        </div>

        <div>
            <x-input-label for="address" :value="__('Endereço')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $user->address)" placeholder="Rua, número, complemento" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <x-input-label for="city" :value="__('Cidade')" />
                <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city', $user->city)" placeholder="São Paulo" />
                <x-input-error class="mt-2" :messages="$errors->get('city')" />
            </div>

            <div>
                <x-input-label for="state" :value="__('Estado')" />
                <select id="state" name="state" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="">Selecione...</option>
                    <option value="AC" {{ old('state', $user->state) == 'AC' ? 'selected' : '' }}>Acre</option>
                    <option value="AL" {{ old('state', $user->state) == 'AL' ? 'selected' : '' }}>Alagoas</option>
                    <option value="AP" {{ old('state', $user->state) == 'AP' ? 'selected' : '' }}>Amapá</option>
                    <option value="AM" {{ old('state', $user->state) == 'AM' ? 'selected' : '' }}>Amazonas</option>
                    <option value="BA" {{ old('state', $user->state) == 'BA' ? 'selected' : '' }}>Bahia</option>
                    <option value="CE" {{ old('state', $user->state) == 'CE' ? 'selected' : '' }}>Ceará</option>
                    <option value="DF" {{ old('state', $user->state) == 'DF' ? 'selected' : '' }}>Distrito Federal</option>
                    <option value="ES" {{ old('state', $user->state) == 'ES' ? 'selected' : '' }}>Espírito Santo</option>
                    <option value="GO" {{ old('state', $user->state) == 'GO' ? 'selected' : '' }}>Goiás</option>
                    <option value="MA" {{ old('state', $user->state) == 'MA' ? 'selected' : '' }}>Maranhão</option>
                    <option value="MT" {{ old('state', $user->state) == 'MT' ? 'selected' : '' }}>Mato Grosso</option>
                    <option value="MS" {{ old('state', $user->state) == 'MS' ? 'selected' : '' }}>Mato Grosso do Sul</option>
                    <option value="MG" {{ old('state', $user->state) == 'MG' ? 'selected' : '' }}>Minas Gerais</option>
                    <option value="PA" {{ old('state', $user->state) == 'PA' ? 'selected' : '' }}>Pará</option>
                    <option value="PB" {{ old('state', $user->state) == 'PB' ? 'selected' : '' }}>Paraíba</option>
                    <option value="PR" {{ old('state', $user->state) == 'PR' ? 'selected' : '' }}>Paraná</option>
                    <option value="PE" {{ old('state', $user->state) == 'PE' ? 'selected' : '' }}>Pernambuco</option>
                    <option value="PI" {{ old('state', $user->state) == 'PI' ? 'selected' : '' }}>Piauí</option>
                    <option value="RJ" {{ old('state', $user->state) == 'RJ' ? 'selected' : '' }}>Rio de Janeiro</option>
                    <option value="RN" {{ old('state', $user->state) == 'RN' ? 'selected' : '' }}>Rio Grande do Norte</option>
                    <option value="RS" {{ old('state', $user->state) == 'RS' ? 'selected' : '' }}>Rio Grande do Sul</option>
                    <option value="RO" {{ old('state', $user->state) == 'RO' ? 'selected' : '' }}>Rondônia</option>
                    <option value="RR" {{ old('state', $user->state) == 'RR' ? 'selected' : '' }}>Roraima</option>
                    <option value="SC" {{ old('state', $user->state) == 'SC' ? 'selected' : '' }}>Santa Catarina</option>
                    <option value="SP" {{ old('state', $user->state) == 'SP' ? 'selected' : '' }}>São Paulo</option>
                    <option value="SE" {{ old('state', $user->state) == 'SE' ? 'selected' : '' }}>Sergipe</option>
                    <option value="TO" {{ old('state', $user->state) == 'TO' ? 'selected' : '' }}>Tocantins</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('state')" />
            </div>

            <div>
                <x-input-label for="country" :value="__('País')" />
                <x-text-input id="country" name="country" type="text" class="mt-1 block w-full" :value="old('country', $user->country ?? 'Brasil')" placeholder="Brasil" />
                <x-input-error class="mt-2" :messages="$errors->get('country')" />
            </div>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Salvar Endereço') }}</x-primary-button>

            @if (session('status') === 'address-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Endereço atualizado!') }}</p>
            @endif
        </div>
    </form>

    <script>
        // Máscaras para formatação
        document.addEventListener('DOMContentLoaded', function() {
            const phoneInput = document.getElementById('phone_address');
            const zipCodeInput = document.getElementById('zip_code');
            
            // Função para formatar o telefone
            function formatPhone(value) {
                const numbers = value.replace(/\D/g, '');
                
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
            
            // Função para formatar o CEP
            function formatZipCode(value) {
                const numbers = value.replace(/\D/g, '');
                
                if (numbers.length <= 5) {
                    return numbers;
                } else if (numbers.length <= 8) {
                    return `${numbers.slice(0, 5)}-${numbers.slice(5)}`;
                } else {
                    return `${numbers.slice(0, 5)}-${numbers.slice(5, 8)}`;
                }
            }
            
            // Aplica formatação do telefone
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
            
            // Aplica formatação do CEP
            zipCodeInput.addEventListener('input', function(e) {
                const cursorPosition = e.target.selectionStart;
                const oldValue = e.target.value;
                const newValue = formatZipCode(oldValue);
                
                e.target.value = newValue;
                
                if (cursorPosition < newValue.length) {
                    e.target.setSelectionRange(cursorPosition, cursorPosition);
                }
            });
            
            // Formata valores iniciais se existirem
            if (phoneInput.value) {
                phoneInput.value = formatPhone(phoneInput.value);
            }
            if (zipCodeInput.value) {
                zipCodeInput.value = formatZipCode(zipCodeInput.value);
            }
        });
    </script>
</section>
