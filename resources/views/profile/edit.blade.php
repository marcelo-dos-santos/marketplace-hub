<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meu Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Profile Header with Photo -->
            <div class="p-6 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex flex-col sm:flex-row items-start sm:items-center space-y-4 sm:space-y-0 sm:space-x-6">
                    <!-- Profile Photo -->
                    <div class="relative">
                        <div class="w-24 h-24 sm:w-32 sm:h-32 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center overflow-hidden">
                            @if($user->profile_photo_path)
                                <img src="{{ asset('storage/' . $user->profile_photo_path) }}" 
                                     alt="{{ $user->name }}" 
                                     class="w-full h-full object-cover">
                            @else
                                <svg class="w-12 h-12 sm:w-16 sm:h-16 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            @endif
                        </div>
                        
                        <!-- Photo Upload Button -->
                        <button type="button" 
                                onclick="document.getElementById('profile_photo').click()"
                                class="absolute -bottom-2 -right-2 bg-blue-600 hover:bg-blue-700 text-white rounded-full p-2 shadow-lg transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                        
                        <!-- Hidden File Input -->
                        <input type="file" 
                               id="profile_photo" 
                               name="profile_photo" 
                               accept="image/*" 
                               class="hidden"
                               onchange="uploadProfilePhoto(this)">
                    </div>
                    
                    <!-- Profile Info -->
                    <div class="flex-1">
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">{{ $user->name }}</h1>
                        <p class="text-gray-600 mt-1">{{ $user->email }}</p>
                        
                        <!-- Role Badge -->
                        <div class="mt-3">
                            @if($user->isAdmin())
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.372-.836-2.942-.734-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                    </svg>
                                    Administrador
                                </span>
                            @elseif($user->isSeller())
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Vendedor
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Cliente
                                </span>
                            @endif
                        </div>
                        
                        <!-- Member Since -->
                        <p class="text-sm text-gray-500 mt-2">
                            Membro desde {{ $user->created_at->format('d/m/Y') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Personal Information -->
            <div class="p-6 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-2xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Address Information -->
            <div class="p-6 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-2xl">
                    @include('profile.partials.update-address-form')
                </div>
            </div>

            <!-- Password Update -->
            <div class="p-6 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-2xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Account Actions -->
            <div class="p-6 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-2xl">
                    @include('profile.partials.account-actions')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="p-6 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-2xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

    <!-- Success/Error Messages -->
    @if(session('status'))
        <div id="status-message" 
             class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50"
             x-data="{ show: true }"
             x-show="show"
             x-transition
             x-init="setTimeout(() => show = false, 3000)">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                {{ session('status') === 'profile-updated' ? 'Perfil atualizado com sucesso!' : session('status') }}
            </div>
        </div>
    @endif

    @if(session('info'))
        <div id="info-message" 
             class="fixed top-4 right-4 bg-blue-500 text-white px-6 py-3 rounded-lg shadow-lg z-50"
             x-data="{ show: true }"
             x-show="show"
             x-transition
             x-init="setTimeout(() => show = false, 5000)">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
                {{ session('info') }}
            </div>
        </div>
    @endif

    <script>
        function uploadProfilePhoto(input) {
            if (input.files && input.files[0]) {
                const formData = new FormData();
                formData.append('profile_photo', input.files[0]);
                formData.append('_token', '{{ csrf_token() }}');
                
                fetch('{{ route("profile.photo") }}', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Erro ao fazer upload da foto: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Erro ao fazer upload da foto');
                });
            }
        }
    </script>
</x-app-layout>
