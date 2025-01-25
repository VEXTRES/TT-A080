<div>
    <x-app-layout>

        <div class="w-full max-h-screen">

            <div class="flex justify-center mt-10">
                <p class="">Numero de Comidas Al Dia: {{$numComidas}}</p>
            </div>

            <div class="border border-black grid grid-cols-3 w-4/5 mx-auto max-h-screen my-14">

                <div class="col-span-{{$comidas->isEmpty()?3:1}} bg-white p-3 rounded-md flex flex-col justify-center space-y-4">
                    @if ($comidas->isEmpty())
                            <p class="text-black text-xl mx-auto">Crear Tu Primer Comida</p>
                            <button class="mx-auto" wire:click="crearComidas">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <p class=>agregar</p>
                            </button>
                        @else

                            <p class="text-black text-xl mx-auto">Crear Otra Comida</p>
                            <button class="mx-auto" wire:click="crearComidas">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <p class=>agregar</p>
                            </button>

                            @foreach ($comidas as $comida)
                                <div class="col-span-1 bg-white p-3 rounded-md">
                                    <p class="text-black text-sm">
                                        Este es el plan de alimentación que se ha creado para usted.
                                    </p>
                                </div>
                            @endforeach

                    @endif
                </div>
            </div>

        </div>



    </x-app-layout>
</div>
