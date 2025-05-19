<div >
    <x-app-layout >

        <div class="w-full min-h-screen bg-[#232931] overflow-y-auto">



            <div class="flex-row pt-10">
                <div class="w-1/5 mx-auto">
                    <p class="text-xl font-black bg-gray-900 text-cyan-500  p-2 rounded-md">Numero de Comidas Al Dia: {{$numComidas}}</p>
                </div>
                @if (session('success'))
                    <div
                        class="alert alert-success mt-3 mx-auto w-1/6"
                        x-data="{showAlert: true}"
                        x-show="showAlert"
                        x-init="setTimeout(() => showAlert = false, 2000)"
                    >
                        <p class="text-green-500 border p-2 rounded-md text-center border-green-500">{{ session('success') }}</p>
                    </div>

                @endif

            </div>

            <div class="border gap-3 border-black grid grid-cols-3 w-4/5 mx-auto my-14 bg-gray-900  ">

                    @if ($is_active)
                        <div class="col-span-{{$comidas->isEmpty()?3:1}} p-3 rounded-md flex justify-center space-y-4 my-2 mx-2 bg-gray-950 text-cyan-500 ">
                            @if ($comidas->isEmpty())
                                        <div wire:click="crearComidas" class="flex flex-col items-center justify-center space-y-2 cursor-pointer w-full h-full  ">
                                            <p class="text-xl mx-auto text-white">Crear Tu Primer Comida</p>
                                            <button class="" >
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <p class="">agregar</p>
                                            </button>
                                        </div>
                            @else

                                    @if ($comidas->count()<$numComidas)
                                    <div wire:click="crearComidas" class="cursor-pointer w-full h-full flex flex-col items-center justify-center space-y-2">
                                        <p class="text-white text-xl mx-auto">Crear Otra Comida</p>
                                        <button class="mx-auto" wire:click="crearComidas">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <p class=>agregar</p>
                                        </button>
                                    </div>
                                    @else
                                    <div class="flex justify-center items-center">
                                        <p class="text-cyan-500 text-center text-lg ">Limite de comidas alcanzado</p>
                                    </div>
                                    @endif


                            @endif
                        </div>
                    @elseif(!$is_active&&$comidas->isEmpty())
                        <div class="col-span-3 bg-gray-950  p-3 rounded-md flex flex-col justify-center space-y-4 my-2 mx-2">
                            <p class=" text-center text-white font-black text-lg">No Hay Comidas</p>
                        </div>
                    @endif

                    @if ($comidas->isNotEmpty())
                    @foreach ($foods as $keymeal => $meal)
                        <div class="col-span-1 my-2 mx-2">
                            <div class="bg-gray-950 text-lime-500  p-3 rounded-md flex flex-col">
                                <div class="flex justify-between border-b border-black">
                                    <p class="text-center mx-auto pb-2 font-bold text-lg">Comida {{$keymeal}}</p>
                                    @if ($is_active)
                                        <button class="mb-auto text-cyan-500 hover:text-cyan-800" wire:click="eliminarComida({{$keymeal}})">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                                <div class="mt-2">
                                    @foreach ($meal as $keyfood => $food)
                                        <div class="flex flex-row justify-between items-center"> <!-- Flexbox para alinear -->
                                            <p class="text-white">{{$meal[$keyfood]['name']}}</p>
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
