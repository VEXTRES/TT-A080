<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-white text-center leading-tight">
                {{ $workoutPlan ? $workoutPlan->name : 'Plan no encontrado' }}
            </h2>
        </x-slot>

        <div class="min-h-screen w-full bg-[#232931]">
            @php
                $days = [
                    'Día 1 (Espalda y Pecho)' => ['pecho', 'espalda'],
                    'Día 2 (Cuadricep)' => ['cuadricep'],
                    'Día 3 (Bicep, Tricep y Hombro)' => ['bicep', 'tricep', 'hombro'],
                    'Día 4 (Gluteo y Pantorrilla)' => ['gluteo', 'pantorrilla'],
                    'Día 5 (Abdomen)' => ['abdomen']
                ];
            @endphp

            @foreach ($days as $day => $muscleGroups)
                <div class="overflow-x-auto px-10 py-10">
                    <!-- Título del día -->
                    <div class="bg-slate-950 hover:bg-black text-cyan-600 text-center p-2">
                        <h2 class="text-lg font-bold">{{ $day }}</h2>
                    </div>

                    <!-- Contenedor de la cuadrícula -->
                    <div class="grid grid-cols-5 border border-gray-900">
                        <!-- Encabezados -->
                        <div class="bg-slate-900 text-cyan-600 p-2 font-semibold text-center border border-cyan-900">músculo</div>
                        <div class="bg-slate-900 text-cyan-600 p-2 font-semibold text-center border border-cyan-900">nombre</div>
                        <div class="bg-slate-900 text-cyan-600 p-2 font-semibold text-center border border-cyan-900">series</div>
                        <div class="bg-slate-900 text-cyan-600 p-2 font-semibold text-center border border-cyan-900">repeticiones</div>
                        <div class="bg-slate-900 text-cyan-600 p-2 font-semibold text-center border border-cyan-900">ejemplo</div>

                        @foreach ($exercises as $exercise)
                            @if (in_array($exercise['type'], $muscleGroups))
                                <div class="p-2 text-center bg-blue-100 border border-gray-900">{{ $exercise['type'] }}</div>
                                <div class="p-2 text-center bg-gray-400 border border-gray-900">{{ $exercise['name'] }}</div>
                                <div class="p-2 text-center bg-blue-100 border border-gray-900">{{ $exercise['series'] }}</div>
                                <div class="p-2 text-center bg-gray-400 border border-gray-900">{{ $exercise['reps'] }}</div>
                                <div class="p-2 text-center bg-blue-100 border border-gray-900 text-blue-500 underline">
                                    <div class="flex justify-center">
                                        <button type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#08235d" class="size-8">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 0 1 0 .656l-5.603 3.113a.375.375 0 0 1-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112Z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </x-app-layout>
</div>
