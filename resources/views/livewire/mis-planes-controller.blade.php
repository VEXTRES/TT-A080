<div x-data="{
    sortOrderAlimentacion: @entangle('sortOrderAlimentacion'),
    sortOrderEntrenamiento: @entangle('sortOrderEntrenamiento')
}">
    @auth
    <x-app-layout>
        <div class=" w-full bg-slate-400 ">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Plan de Alimentacion') }}
                </h2>
            </x-slot>

            <div class=" bg-slate-600 bg-opacity-75 ">
                 <div class="absolute m-auto mt-6 w-3/4 h-screen inset-0" style="display: block;">{{-- {{ $showModal === true ? 'block' : 'none' }} --}}
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
                                @switch($questionId)
                                    @case(1)
                                        <select name="" id=""></select>
                                        @break
                                    @case(2)
                                        <select name="" id=""></select>
                                        @break
                                    @case(3)
                                        <select name="" id=""></select>
                                        @break
                                    @case(4)
                                        @foreach ($options[$questionId] as $optionId => $optionName)
                                        <label for="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                        class="inline-flex items-center">
                                            <input
                                                id="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                name="radioAnswer_{{ $questionId }}"
                                                class="ml-2 mr-2"
                                                type="radio"
                                                wire:model="answersSelected.{{ $questionId }}"
                                                value="{{ $optionId }}">
                                            {{ $optionName }}
                                        </label>
                                        @endforeach
                                        @break
                                    @case(5)
                                        @foreach ($options[$questionId] as $optionId => $optionName)
                                        <label for="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                        class="inline-flex items-center">
                                            <input
                                                id="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                name="radioAnswer_{{ $questionId }}"
                                                class="ml-2 mr-2"
                                                type="radio"
                                                wire:model="answersSelected.{{ $questionId }}"
                                                value="{{ $optionId }}">
                                            {{ $optionName }}
                                        </label>
                                        @endforeach
                                        @break
                                    @case(6)
                                        <input class="w-2/3 border border-black" type="textarea" width="100%" rows="3"
                                        placeholder="Escribe Aqui el nombre Del Alimento Al que eres Alergico">
                                        @break
                                    @case(7)
                                        <select name="" id=""></select>
                                        @break
                                    @case(8)
                                    <select name="" id=""></select>
                                        @break
                                    @case(9)
                                    <select name="" id=""></select>
                                        @break
                                    @case(10)
                                        foto grasa
                                        @break
                                    @case(11)
                                        tipo de cuaerpo
                                        @break
                                    @case(12)
                                        @foreach ($options[$questionId] as $optionId => $optionName)
                                        <label for="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                        class="inline-flex items-center">
                                            <input
                                                id="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                name="radioAnswer_{{ $questionId }}"
                                                class="ml-2 mr-2"
                                                type="radio"
                                                wire:model="answersSelected.{{ $questionId }}"
                                                value="{{ $optionId }}">
                                            {{ $optionName }}
                                        </label>
                                        @endforeach
                                        @break
                                    @case(13)
                                        @foreach ($options[$questionId] as $optionId => $optionName)
                                        <label for="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                        class="inline-flex items-center">
                                            <input
                                                id="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                name="radioAnswer_{{ $questionId }}"
                                                class="ml-2 mr-2"
                                                type="radio"
                                                wire:model="answersSelected.{{ $questionId }}"
                                                value="{{ $optionId }}">
                                            {{ $optionName }}
                                        </label>
                                        @endforeach
                                        @break
                                    @case(14)
                                        @foreach ($options[$questionId] as $optionId => $optionName)
                                        <label for="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                        class="inline-flex items-center">
                                            <input
                                                id="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                name="radioAnswer_{{ $questionId }}"
                                                class="ml-2 mr-2"
                                                type="radio"
                                                wire:model="answersSelected.{{ $questionId }}"
                                                value="{{ $optionId }}">
                                            {{ $optionName }}
                                        </label>
                                        @endforeach
                                        @break
                                    @case(15)
                                        @foreach ($options[$questionId] as $optionId => $optionName)
                                        <label for="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                        class="inline-flex items-center">
                                            <input
                                                id="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                name="radioAnswer_{{ $questionId }}"
                                                class="ml-2 mr-2"
                                                type="radio"
                                                wire:model="answersSelected.{{ $questionId }}"
                                                value="{{ $optionId }}">
                                            {{ $optionName }}
                                        </label>
                                        @endforeach
                                        @break
                                    @case(16)
                                        <select name="" id=""></select>
                                        <select name="" id=""></select>
                                        @break
                                    @case(17)
                                        @foreach ($options[$questionId] as $optionId => $optionName)
                                            <label for="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                class="inline-flex items-center mb-3">
                                                <input
                                                    id="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                    name="radioAnswer_{{ $questionId }}"
                                                    class="ml-2 mr-2"
                                                    type="radio"
                                                    wire:model="answersSelected.{{ $questionId }}"
                                                    value="{{ $optionId }}">
                                                <span class="ml-2">{{ $optionName }}</span> <!-- Agrega un espacio al texto -->
                                            </label>
                                        @endforeach
                                        @break


                                    @default

                                @endswitch
                                    {{-- @foreach ($answers[$questionId] as $answerId => $answerName)
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
                                    @endforeach --}}
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


                <div class=" min-h-[50vh] bg-slate-600 ">
                    <div class="flex space-x-4">
                        <p class="text-xl font-black">Plan de Alimentacion</p>
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
                            @if ($meal_plans->isEmpty())

                            <div class="col-auto flex items-center ml-4 mt-4 underline text-xl">
                                <p >No hay plan de Alimentacion disponibles.</p>
                            </div>

                            @else
                                @foreach ($meal_plans as $meal_plan)
                                    <div class="col-auto flex items-center ml-4 mt-4">
                                        <div class="border border-black py-28 px-4 rounded-md flex flex-col gap-0">
                                            <div class="text-md font-bold  -mt-24 -ml-2">{{ $meal_plan->id }}</div>
                                            <div class="text-center mt-20">{{ $meal_plan->name }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <!-- Puedes agregar más elementos "hola" según sea necesario -->
                        </div>
                    </div>


                </div>

                <div class=" min-h-[50vh] bg-slate-300">
                    <div class="flex space-x-4">
                        <p class="text-xl font-black">Plan de Entrenamiento</p>
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
                        @if ($workout_plans->isEmpty())
                            <div class="col-auto flex items-center ml-4 mt-10 underline text-xl">
                                <p >No hay plan de entrenamiento disponibles.</p>
                            </div>
                        @else
                            @foreach ($workout_plans as $workout_plan)
                                <div class="col-auto flex items-center ml-4 mt-4">
                                    <div class="border border-black py-28 px-4 rounded-md flex flex-col gap-0">
                                        <div class="text-md font-bold  -mt-24 -ml-2">{{ $workout_plan->id }}</div>
                                        <div class="text-center mt-20">{{ $workout_plan->name }}</div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>


        </div>
    </x-app-layout>
@endauth

</div>
