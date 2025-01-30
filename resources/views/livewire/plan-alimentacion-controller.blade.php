<div >
    <x-app-layout>

        <div class="w-full min-h-screen ">

            <div class="flex justify-center mt-10">
                <p class="text-xl font-black">Numero de Comidas Al Dia: {{$numComidas}}</p>
            </div>

            <div class="border gap-3 border-black grid grid-cols-3 w-4/5 mx-auto my-14">

                <div class="col-span-{{$comidas->isEmpty()?3:1}} bg-white p-3 rounded-md flex flex-col justify-center space-y-4 my-2 mx-2">
                    @if ($comidas->isEmpty())
                            <p class="text-black text-xl mx-auto">Crear Tu Primer Comida</p>
                            <button class="mx-auto" wire:click="crearComidas">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <p class=>agregar</p>
                            </button>
                        @else
                            @if ($comidas->count()<$numComidas)
                                <p class="text-black text-xl mx-auto">Crear Otra Comida</p>
                                <button class="mx-auto" wire:click="crearComidas">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <p class=>agregar</p>
                                </button>
                                @else
                                <p>No puedes agregar mas comidas</p>
                            @endif
                    @endif
                </div>
                    @if ($comidas->isNotEmpty())
                    @foreach ($foods as $keymeal => $meal)
                        <div class="col-span-1 my-2 mx-2">
                            <div class="bg-white p-3 rounded-md flex flex-col">
                                <div class="flex justify-between border-b border-black">
                                    <p class="text-center mx-auto pb-2 font-bold text-lg">Comida {{$keymeal}}</p>
                                    <button class="mb-auto" wire:click="eliminarComida({{$keymeal}})">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                          </svg>
                                    </button>
                                </div>
                                <div class="mt-2">
                                    @foreach ($meal as $keyfood => $food)
                                        <div class="flex flex-row justify-between items-center"> <!-- Flexbox para alinear -->
                                            <p class="text-black">{{$meal[$keyfood]['name']}}</p>
                                            <p class="text-sm font-black">{{$meal[$keyfood]['quantity']}} Gr</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @endif
            </div>

        </div>



    </x-app-layout>
</div>
