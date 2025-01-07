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
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-semibold">Sondeo preguntas</h2>
                            <button wire:click="MostrarModal" class="text-white p-3 rounded-md bg-black hover:text-gray-300">&times;</button>
                        </div>
                        @if (!empty($questionsPaginated))
                            @foreach ($questionsPaginated as $questionId => $questionName)
                                <p class="mt-4">Pregunta: {{ $questionId }}</p>
                                <p>{{ $questionName }}</p>
                                <p>Respuestas:</p>
                                @foreach ($answers[$questionId] as $answer)
                                    <p class="mt-4">{{ $answer }}</p>
                                @endforeach
                            @endforeach
                        @else
                            <p>No hay preguntas disponibles.</p>
                        @endif

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
                            <button class="rounded-md bg-white px-4 py-2 text-sm text-gray-700" wire:click="MostrarModal">
                                Crear Plan
                            </button>

                        </div>
                        <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            <!-- Los elementos "hola" se acomodarán automáticamente en columnas -->
                            <div class="col-auto flex items-center justify-center">
                                Plan1
                            </div>
                            <div class="col-auto flex items-center justify-center">
                                Plan2
                            </div>
                            <div class="col-auto flex items-center justify-center">
                                Plan3
                            </div>
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
                    <div x-show="sortOrderEntrenamiento == 'open'">
                        esto se va ocultar
                    </div>
                </div>
            </div>


        </div>
    </x-app-layout>
@endauth

</div>
