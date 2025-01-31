<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Seguimiento') }}
            </h2>
        </x-slot>


        <div>

        @if ($meal_plans->isEmpty())
            <div>
                <p>No hay plan de Posible creacion de seguimiento disponibles. Debe crear un plan</p>
            </div>
        @else

            <div>
                <div class="flex gap-4 mt-4 ml-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <p class="">Crear Seguimiento</p>
                </div>
                <div>

                </div>
            </div>

        @endif


        </div>

    </x-app-layout>
</div>
