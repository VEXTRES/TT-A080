<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Panel de Administración') }}
            </h2>
        </x-slot>

        <div class="py-8 bg-slate-50 min-h-screen">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Header del Dashboard -->
                <div class="mb-8">
                    <div class="bg-blue-800 rounded-lg shadow-sm border border-slate-200 p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-2xl font-bold text-black">Gestión de Usuarios</h1>
                                <p class="text-white mt-1">Administra los usuarios y sus planes de alimentación</p>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="bg-slate-100 rounded-lg px-4 py-2">
                                    <span class="text-sm text-slate-600">Total usuarios:</span>
                                    <span class="font-semibold text-slate-800 ml-1">{{ count($users) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Barra de búsqueda mejorada -->
                <div class="mb-6">
                    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-4 mb-6">
                        <div class="flex items-center space-x-4">
                            <div class="flex-1 max-w-md relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                                <input type="text" wire:model.live="search" placeholder="Buscar por nombre o email..."
                                    class="block w-full pl-10 pr-3 py-2.5 border border-slate-300 rounded-lg bg-slate-50 text-slate-900 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:border-transparent">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabla de usuarios -->
                <div class="bg-white rounded-lg shadow-sm border border-slate-200 overflow-hidden">
                    <!-- Header de la tabla -->
                    <div class="bg-gray-300 border-b border-slate-200">
                        <div class="grid grid-cols-5 gap-4 px-6 py-4">
                            <div class="text-left">
                                <span class="text-sm font-semibold text-slate-700 uppercase tracking-wider">ID</span>
                            </div>
                            <div class="text-left">
                                <span class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Usuario</span>
                            </div>
                            <div class="text-left">
                                <span class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Email</span>
                            </div>
                            <div class="text-center">
                                <span class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Planes</span>
                            </div>
                            <div class="text-center">
                                <span class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Acciones</span>
                            </div>
                        </div>
                    </div>

                    <!-- Cuerpo de la tabla -->
                    <div class="divide-y divide-slate-200">
                        @forelse ($users as $user)
                            <div class="grid grid-cols-5 gap-4 px-6 py-4 hover:bg-slate-50 transition-colors duration-150">
                                <!-- ID -->
                                <div class="flex items-center">
                                    <span class="text-sm font-mono text-slate-600 bg-slate-100 px-2 py-1 rounded">
                                        #{{ str_pad($user->id, 3, '0', STR_PAD_LEFT) }}
                                    </span>
                                </div>

                                <!-- Usuario -->
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div class="h-10 w-10 rounded-full bg-slate-300 flex items-center justify-center">
                                            <span class="text-sm font-medium text-slate-700">
                                                {{ strtoupper(substr($user->name, 0, 2)) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-slate-900">{{ $user->name }}</p>
                                        <p class="text-xs text-slate-500">Miembro desde {{ $user->created_at->format('M Y') }}</p>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="flex items-center">
                                    <div class="text-sm text-slate-900">{{ $user->email }}</div>
                                </div>

                                <!-- Planes -->
                                <div class="flex items-center justify-center">
                                    <a href="{{ route('admin.detalles-usuario', $user->id) }}"
                                       class="inline-flex items-center px-3 py-1.5 bg-blue-100 hover:bg-blue-200 text-blue-800 text-xs font-medium rounded-full transition-colors duration-200">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        Ver planes
                                    </a>
                                </div>

                                <!-- Acciones -->
                                <div class="flex items-center justify-center space-x-3">

                                    <button wire:click="deleteUser({{ $user->id }})"
                                            wire:confirm="¿Estás seguro de que quieres eliminar este usuario? Esta acción no se puede deshacer."
                                            class="p-2 text-slate-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors duration-200"
                                            title="Eliminar usuario">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @empty
                            <div class="px-6 py-12 text-center">
                                <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-slate-900">No hay usuarios</h3>
                                <p class="mt-1 text-sm text-slate-500">No se encontraron usuarios en el sistema.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Paginación (si es necesaria) -->
                @if(method_exists($users, 'links'))
                    <div class="mt-6">
                        {{ $users->links() }}
                    </div>
                @endif

                <!-- Footer con estadísticas -->
                <div class="mt-8">
                    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-slate-800">{{ count($users) }}</div>
                                <div class="text-sm text-slate-600">Total Usuarios</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-blue-600">{{ $users->where('created_at', '>=', now()->subDays(30))->count() }}</div>
                                <div class="text-sm text-slate-600">Nuevos (30 días)</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-green-600">85%</div>
                                <div class="text-sm text-slate-600">Usuarios Activos</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-purple-600">142</div>
                                <div class="text-sm text-slate-600">Planes Creados</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>
