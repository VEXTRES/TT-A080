<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Administrar Planes de Usuario') }}
            </h2>
        </x-slot>

        <div class="py-6 bg-gray-50 min-h-screen">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Header con información del usuario -->
                <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="bg-blue-500 rounded-full p-3">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <div>
                                @if ($meal_plans->isNotEmpty())
                                    <h3 class="text-2xl font-bold text-gray-800">{{ $meal_plans->first()->email ?? 'Usuario' }}</h3>
                                    <p class="text-gray-600">{{ $meal_plans->count() }} plan(es) de alimentación</p>
                                @else
                                    <h3 class="text-2xl font-bold text-gray-800">Usuario</h3>
                                    <p class="text-gray-600">Sin planes registrados</p>
                                @endif
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                                Admin Panel
                            </span>
                        </div>
                    </div>
                </div>

                @if ($meal_plans->isNotEmpty())
                    <!-- Planes de Alimentación -->
                    <div class="bg-white rounded-lg shadow-lg mb-8">
                        <div class="px-6 py-4 bg-blue-800 rounded-t-lg">
                            <h4 class="text-xl font-bold text-white flex items-center">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                Planes de Alimentación
                            </h4>
                        </div>
                        <div class="p-6">
                            <div class="grid gap-4">
                                @foreach ($meal_plans as $meal_plan)
                                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow duration-200">
                                        <div class="flex items-center justify-between">
                                            <div class="flex-1">
                                                <div class="flex items-center space-x-3 mb-2">
                                                    <h5 class="text-lg font-semibold text-gray-800">{{ $meal_plan->name }}</h5>
                                                    @if ($meal_plan->is_active)
                                                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">
                                                            Activo
                                                        </span>
                                                    @else
                                                        <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-medium">
                                                            Inactivo
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="grid md:grid-cols-4 gap-4 text-sm">
                                                    <div class="bg-red-50 p-3 rounded-lg">
                                                        <p class="text-red-600 font-medium">Calorías Totales</p>
                                                        <p class="text-red-800 font-bold text-lg">{{ number_format($meal_plan->total_calories) }}</p>
                                                    </div>
                                                    <div class="bg-blue-50 p-3 rounded-lg">
                                                        <p class="text-blue-600 font-medium">Proteínas</p>
                                                        <p class="text-blue-800 font-bold text-lg">{{ $meal_plan->total_proteins }}g</p>
                                                    </div>
                                                    <div class="bg-yellow-50 p-3 rounded-lg">
                                                        <p class="text-yellow-600 font-medium">Carbohidratos</p>
                                                        <p class="text-yellow-800 font-bold text-lg">{{ $meal_plan->total_carbs }}g</p>
                                                    </div>
                                                    <div class="bg-green-50 p-3 rounded-lg">
                                                        <p class="text-green-600 font-medium">Grasas</p>
                                                        <p class="text-green-800 font-bold text-lg">{{ $meal_plan->total_fats }}g</p>
                                                    </div>
                                                </div>

                                                <div class="mt-3 text-sm text-gray-600">
                                                    <p><strong>Creado:</strong> {{ $meal_plan->created_at->format('d/m/Y H:i') }}</p>
                                                </div>
                                            </div>

                                            <div class="flex flex-col space-y-2 ml-4">
                                                <a href="{{ route('plan-alimentacion', $meal_plan->id) }}"
                                                   class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-medium transition-colors duration-200 text-center">
                                                    Ver Detalles
                                                </a>
                                                <button wire:click="deleteMealPlan({{ $meal_plan->id }})"
                                                        class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm font-medium transition-colors duration-200">
                                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                    Eliminar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Planes de Entrenamiento -->
                    @if ($workoutPlans && count($workoutPlans) > 0)
                        <div class="bg-white rounded-lg shadow-lg">
                            <div class="px-6 py-4 bg-gradient-to-r bg-blue-800 rounded-t-lg">
                                <h4 class="text-xl font-bold text-white flex items-center">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                    Planes de Entrenamiento
                                </h4>
                            </div>
                            <div class="p-6">
                                <div class="grid gap-4">
                                    @foreach ($workoutPlans as $workoutPlan)
                                        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow duration-200">
                                            <div class="flex items-center justify-between">
                                                <div class="flex-1">
                                                    <h5 class="text-lg font-semibold text-gray-800 mb-2">{{ $workoutPlan->name }}</h5>

                                                    <div class="grid md:grid-cols-3 gap-4 text-sm">
                                                        <div class="bg-blue-50 p-3 rounded-lg">
                                                            <p class="text-blue-600 font-medium">Total de Ejercicios</p>
                                                            <p class="text-blue-800 font-bold text-lg">{{ $workoutPlan->exercises()->count() }}</p>
                                                        </div>
                                                        <div class="bg-purple-50 p-3 rounded-lg">
                                                            <p class="text-purple-600 font-medium">Grupos Musculares</p>
                                                            <p class="text-purple-800 font-bold text-lg">{{ $workoutPlan->exercises()->distinct('type')->count('type') }}</p>
                                                        </div>
                                                        <div class="bg-green-50 p-3 rounded-lg">
                                                            <p class="text-green-600 font-medium">Estado</p>
                                                            <p class="text-green-800 font-bold text-lg">Activo</p>
                                                        </div>
                                                    </div>

                                                    <div class="mt-3 text-sm text-gray-600">
                                                        <p><strong>Creado:</strong> {{ $workoutPlan->created_at->format('d/m/Y H:i') }}</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                @else
                    <!-- Estado vacío -->
                    <div class="bg-white rounded-lg shadow-lg p-12 text-center">
                        <div class="max-w-md mx-auto">
                            <svg class="w-24 h-24 text-gray-400 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">No hay planes registrados</h3>
                            <p class="text-gray-600 mb-6">Este usuario no tiene planes de alimentación o entrenamiento activos.</p>
                            <div class="bg-blue-50 p-4 rounded-lg">
                                <p class="text-blue-800 text-sm">
                                    <strong>Tip:</strong> Los usuarios pueden crear sus planes desde la sección "Mis Planes" en su panel personal.
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Botón de regreso -->
                <div class="mt-8 text-center">
                    <a href="{{ route('admin.dashboard') }}"
                       class="inline-flex items-center px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Volver al Dashboard
                    </a>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>
