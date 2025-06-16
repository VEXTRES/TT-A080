<div>
    <x-app-layout>

        <div class="w-full min-h-screen bg-[#232931] overflow-y-auto">

            <div class="flex-row ">
                <!-- Div mejorado del número de comidas -->
                <div class="w-full mx-auto mb-">
                    <div class="bg-gradient-to-r from-gray-900 to-gray-800 border border-cyan-500/30 rounded-xl p-2 shadow-2xl">
                        <!-- Header con ícono -->
                        <div class="flex items-center justify-between mb-1 gap-4">
                            <!-- Espacio vacío para balance -->
                            <div class="flex-1"></div>
                            <!-- Contenido central: Reloj + Título -->
                            <div class="flex items-center gap-2">
                                <div class="bg-cyan-500/20 rounded-full p-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-cyan-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </div>
                                <h2 class="text-2xl font-bold text-cyan-400">Plan Alimentario</h2>
                            </div>
                            <!-- Contador de comidas a la derecha -->
                            <div class="flex-1 flex justify-end">
                                <div class="inline-flex items-center bg-cyan-500/10 border border-cyan-500/30 rounded-lg px-4 py-2">
                                    <span class="text-lg text-white mr-2">Comidas diarias:</span>
                                    <span class="text-2xl font-black text-cyan-400 bg-cyan-500/20 px-3 py-1 rounded-md">{{$numMeals}}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Separador con estilo -->
                        <div class="flex items-center my-2">
                            <div class="flex-1 h-px bg-gradient-to-r from-transparent via-cyan-500/50 to-transparent"></div>
                            <span class="px-4 text-cyan-400 text-sm font-medium">Macronutrientes por comida</span>
                            <div class="flex-1 h-px bg-gradient-to-r from-transparent via-cyan-500/50 to-transparent"></div>
                        </div>

                        <!-- Grid de macronutrientes -->
                        <div class="grid grid-cols-3 gap-4">
                            <!-- Proteínas -->
                            <div class="bg-gray-800/50 border border-lime-500/30 rounded-lg p-4 text-center hover:bg-gray-800/70 transition-all duration-300">
                                <div class="flex items-center justify-center mb-2">
                                    <div class="w-3 h-3 bg-lime-500 rounded-full mr-2"></div>
                                    <span class="text-white font-semibold text-xs">Proteínas</span>
                                </div>
                                <div class="text-2xl font-black text-lime-400">{{$proteinsPerMeal}}</div>
                                <div class="text-xs text-gray-400 mt-1">gramos</div>
                            </div>

                            <!-- Carbohidratos -->
                            <div class="bg-gray-800/50 border border-blue-500/30 rounded-lg p-4 text-center hover:bg-gray-800/70 transition-all duration-300">
                                <div class="flex items-center justify-center mb-2">
                                    <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                                    <span class="text-white font-semibold text-xs">Carbohidratos</span>
                                </div>
                                <div class="text-2xl font-black text-blue-400">{{$carbsPerMeal}}</div>
                                <div class="text-xs text-gray-400 mt-1">gramos</div>
                            </div>

                            <!-- Grasas -->
                            <div class="bg-gray-800/50 border border-yellow-500/30 rounded-lg p-4 text-center hover:bg-gray-800/70 transition-all duration-300">
                                <div class="flex items-center justify-center mb-2">
                                    <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
                                    <span class="text-white font-semibold text-xs">Grasas</span>
                                </div>
                                <div class="text-2xl font-black text-yellow-400">{{$fatsPerMeal}}</div>
                                <div class="text-xs text-gray-400 mt-1">gramos</div>
                            </div>
                        </div>
                    </div>
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

            <div class="border gap-3 border-black grid grid-cols-3 w-4/5 mx-auto my-3 bg-gray-900">

                @if ($is_active)
                    <div class="col-span-{{$comidas->isEmpty()?3:1}} p-3 rounded-md flex justify-center space-y-4 my-2 mx-2 bg-gray-950 text-cyan-500">
                        @if ($comidas->isEmpty())
                            <div wire:click="crearComidas" class="flex flex-col items-center justify-center space-y-2 cursor-pointer w-full h-full">
                                <p class="text-xl mx-auto text-white">Crear Tu Primer Comida</p>
                                <button class="">
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
                                <p class="text-cyan-500 text-center text-lg">Limite de comidas alcanzado</p>
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
                                        <p class="text-sm font-black">{{$meal[$keyfood]['quantity']}} gr</p>
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
