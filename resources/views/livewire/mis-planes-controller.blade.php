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
                <div x-show="sortOrderAlimentacion == 'open'">
                    esto se va ocultar
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
    </x-app-layout>
@endauth

</div>
