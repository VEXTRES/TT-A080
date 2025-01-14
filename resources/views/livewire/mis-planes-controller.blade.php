<div x-data="{
    sortOrderAlimentacion: @entangle('sortOrderAlimentacion'),
    sortOrderEntrenamiento: @entangle('sortOrderEntrenamiento')
}">
    @auth
    <x-app-layout>
        <div class=" w-full bg-slate-400 h-screen ">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Plan de Alimentacion') }}
                </h2>
            </x-slot>

            <div class=" bg-slate-600 bg-opacity-75">
                <div class="absolute m-auto w-3/4 h-screen inset-0" style="display: {{ $showModal === true ? 'block' : 'none' }};">
                    <div class="bg-white p-8 rounded-lg shadow-lg">
                        <!-- Modal Content -->
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-semibold mx-auto">Sondeo preguntas</h2>
                            <button wire:click="MostrarModal" class="text-white p-3 rounded-md bg-black hover:text-gray-300">&times;</button>
                        </div>
                        <form wire:submit="CrearPlan">
                            <div class="flex justify-end mt-3">
                                <button type="submit" class=" px-4 py-2 bg-blue-500 text-white rounded-lg">Crear Plan</button>
                            </div>
                            @if (!empty($questionsPaginated))
                                @foreach ($questionsPaginated as $questionId => $questionName)
                                <p class="mt-4">Pregunta: {{ $questionId }}</p>
                                <p>{{ $questionName }}</p>
                                <p>Respuestas:</p>
                                    @foreach ($answers[$questionId] as $answerId => $answerName)
                                    <label for="radioAnswer_{{ $questionId }}_{{ $answerId }}"
                                    class="inline-flex items-center">
                                        <input
                                            id="radioAnswer_{{ $questionId }}_{{ $answerId }}"
                                            name="radioAnswer_{{ $questionId }}"
                                            class="ml-2 mr-2"
                                            type="radio"
                                            wire:model="answersSelected.{{ $questionId }}"
                                            value="{{ $answerId }}">
                                        {{ $answerName }}
                                    </label>
                                    @endforeach
                                @endforeach

                            @else
                                <p>No hay preguntas disponibles.</p>
                            @endif
                        </form>
                        <div class="mt-6 flex justify-between items-center">
                            <button
                                wire:click="previousPage"
                                class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg {{ $currentPage == 1 ? 'opacity-50 cursor-not-allowed' : '' }}"
                                {{ $currentPage == 1 ? 'disabled' : '' }}>
                                Anterior
                            </button>
                            <p>Página {{ $currentPage }}</p>
                            <button
                                wire:click="nextPage"
                                class="px-4 py-2 bg-blue-500 text-white rounded-lg {{ (count($questions) <= $currentPage * $perPage) ? 'opacity-50 cursor-not-allowed' : '' }}"
                                {{ (count($questions) <= $currentPage * $perPage) ? 'disabled' : '' }}>
                                Siguiente
                            </button>
                        </div>
                    </div>
                </div>
            </div>


                <div class=" h-1/2 bg-slate-600 ">
                    <div class="flex space-x-4">
                        <p class="">Plan de Alimentacion</p>
                        <button wire:click="setOrderAlimentacion">
                            @if ($sortOrderAlimentacion == 'close')
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                </svg>
                            @endif
                        </button>
                    </div>
                    <div class="flex items-center h-full" x-show="sortOrderAlimentacion == 'open'">


                        <div class="flex-none justify-center text-center mr-8">
                            <button class="rounded-md ml-2 bg-white px-4 py-2 text-sm text-gray-700" wire:click="MostrarModal">
                                Crear Nuevo Plan
                            </button>

                        </div>
                        <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            <!-- Los elementos "hola" se acomodarán automáticamente en columnas -->
                            @if ($meal_plans)

                                    @foreach ($meal_plans as $meal_plan)
                                        <div class="border border-black py-20 px-2 rounded-md relative">
                                            <p class="absolute top-2 left-2 text-sm font-bold text-xl">{{ $meal_plan->id }}</p>
                                            <p class="text-center">{{ $meal_plan->name }}</p>
                                        </div>
                                    @endforeach

                            @else
                                <p>No hay plan de alimentacion disponibles.</p>
                            @endif

                            <!-- Puedes agregar más elementos "hola" según sea necesario -->
                        </div>
                    </div>


                </div>

                <div class=" h-1/2 bg-slate-300">
                    <div class="flex space-x-4">
                        <p class="">Plan de Entrenamiento</p>
                        <button wire:click="setOrderEntrenamiento">
                            @if ($sortOrderEntrenamiento == 'close')
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                </svg>
                            @endif

                        </button>
                    </div>
                    <div x-show="sortOrderEntrenamiento == 'open'"
                    class="h-full flex-1 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4"
                    >
                        @if ($workout_plans)
                            @foreach ($workout_plans as $workout_plan)
                                <div class="col-auto flex items-center ml-4">
                                    <div class="border border-black py-28 px-4 rounded-md relative">
                                        <p class="absolute top-2 left-2 text-sm font-bold text-xl">{{ $workout_plan->id }}</p>
                                        <p class="text-center">{{ $workout_plan->name }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No hay plan de entrenamiento disponibles.</p>
                        @endif
                    </div>
                </div>
            </div>


        </div>
    </x-app-layout>
@endauth

</div>
