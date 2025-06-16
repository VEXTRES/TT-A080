<div>
    <x-app-layout>
        <div x-data="{showNotification: false}">
            <div x-data="{
                showNotification: false,
                limitMessage: '',
                errorMessage: ''
            }"
            @show-limit-message.window="limitMessage = $event.detail; showNotification = true; setTimeout(() => showNotification = false, 3000)"
            @show-error-message.window="errorMessage = $event.detail; showNotification = true; setTimeout(() => showNotification = false, 3000)">

                <!-- Notificación de límite -->
                <div x-show="showNotification && limitMessage"
                     class="fixed top-4 right-4 bg-yellow-500 text-white px-4 py-2 rounded-md shadow-lg z-50"
                     x-transition>
                    <span x-text="limitMessage"></span>
                </div>

                <!-- Notificación de error -->
                <div x-show="showNotification && errorMessage"
                     class="fixed top-4 right-4 bg-red-500 text-white px-4 py-2 rounded-md shadow-lg z-50"
                     x-transition>
                    <span x-text="errorMessage"></span>
                </div>

            <div class=" {{$showModal===true?'fixed inset-0 bg-black/50 backdrop-blur-sm':''}} ">

                <div class="{{$showModal === true ? 'fixed inset-0 bg-black/50 backdrop-blur-sm' : ''}}">
                    <div class="absolute m-auto mt-6 w-3/4 min-h-screen inset-0" style="display: {{$showModal == true ? 'block' : 'none'}};">
                        <div class="bg-slate-800 p-8 rounded-lg shadow-lg flex flex-col" @click.outside="$wire.call('mostrarModal')">
                            <p class="text-white text-xl mb-4 mx-auto">Buscar Alimento</p>
                            <div class="my-3 flex mx-auto justify-start gap-3 w-2/3">
                                <input
                                    class="w-full bg-transparent placeholder:text-slate-400 placeholder:text-center text-white text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-blue-500 hover:border-blue-300 shadow-sm focus:shadow"
                                    placeholder="Busca Un Alimento"
                                    wire:model="search"
                                />
                                <button type="button" wire:click="buscarAlimento">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="white"
                                        class="size-10"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                    </svg>
                                </button>
                            </div>
                            @if (isset($foodCatalog))
                                <div class="flex justify-end mb-3">
                                    <button
                                        type="button"
                                        class="inline-flex h-12 animate-shimmer items-center justify-center rounded-md border border-slate-800 bg-[linear-gradient(110deg,#000103,45%,#1e2631,55%,#000103)] bg-[length:200%_100%] px-6 font-medium text-slate-400 transition-colors focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 focus:ring-offset-slate-50"
                                        wire:click="guardandoAlimento">
                                        Seleccionar
                                    </button>
                                </div>
                            @endif

                            <div class="w-full max-h-80 overflow-y-auto [&::-webkit-scrollbar]:w-2
                            [&::-webkit-scrollbar-track]:rounded-full
                            [&::-webkit-scrollbar-track]:bg-gray-100
                            [&::-webkit-scrollbar-thumb]:rounded-full
                            [&::-webkit-scrollbar-thumb]:bg-gray-300
                            dark:[&::-webkit-scrollbar-track]:bg-neutral-700
                            dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
                                @if (isset($foodCatalog))
                                    <ul>
                                        @foreach ($foodCatalog as $key => $food)
                                            <div class="flex w-3/5 mx-auto justify-center items-center gap-5 border-b mb-5 border-slate-600">
                                                @if ($food['food_name'] =='Nada')
                                                <p class="text-xl text-zinc-400">No hay nada que buscar</p>
                                                @else
                                                    <li><p class="text-xl text-zinc-400">{{$food['food_name']}}</p></li>
                                                    <input
                                                        type="checkbox"
                                                        name="{{$food['food_id']}}"
                                                        id="{{$food['food_id']}}"
                                                        value="{{$food['food_id']}}"
                                                        wire:model="foodsSelect.{{$food['food_id']}}"
                                                        class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800"
                                                    >
                                                @endif
                                            </div>
                                        @endforeach
                                    </ul>
                                @else
                                    <li></li>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div
                x-data="{ notification: @entangle('notification') }"
                x-effect="
                    if (notification !== null) {
                        setTimeout(() => notification = null, 2000)
                    }
                "
            >
            <div class="relative" x-show="notification === 0">
                <div class="absolute w-2/5 right-3 top-3">
                    <div class="inline-flex items-center bg-gray-200 border-2 border-lime-500 text-black rounded-md p-3 w-full">
                        <p>
                            Seleccione <span class="font-bold">1 alimento</span> por categoría
                        </p>
                    </div>
                </div>
            </div>

            <div class="p-4  text-white w-full bg-[#232931]">
                <button class="absolute top-[15%] right-4 inline-flex gap-2 h-12 animate-shimmer items-center justify-center rounded-md border bg-gray-900 border-lime-500 px-4 text-white hover:bg-gray-800 transition-colors"
                wire:click="crearComida"
                x-on:click="showNotification = true, setTimeout(()=>showNotification=false, 2000)">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5" />
                    </svg>
                    <p>Crear Comida</p>
                </button>
                <div class="bg-gradient-to-r from-gray-900 to-gray-800 border border-lime-500/30 p-4 mb-2 w-full rounded-xl shadow-2xl">
                    <div class="flex items-center justify-center mb-3">
                        <div class="bg-lime-500/20 rounded-full p-1.5 mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-lime-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.252 8.252 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
                            </svg>
                        </div>
                        <h2 class="text-lg font-bold text-lime-400">Comida {{$currentFood}} del Día</h2>
                    </div>

                    <!-- Separador con estilo -->
                    <div class="flex items-center my-3">
                        <div class="flex-1 h-px bg-gradient-to-r from-transparent via-lime-500/50 to-transparent"></div>
                        <span class="px-3 text-lime-400 text-xs font-medium">Macronutrientes</span>
                        <div class="flex-1 h-px bg-gradient-to-r from-transparent via-lime-500/50 to-transparent"></div>
                    </div>

                    <!-- Grid de macronutrientes -->
                    <div class="grid grid-cols-3 gap-2">
                        <!-- Proteínas -->
                        <div class="bg-gray-800/50 border border-lime-500/30 rounded-lg p-2 hover:bg-gray-800/70 transition-all duration-300">
                            <div class="flex flex-col items-center text-center">
                                <div class="flex items-center mb-1">
                                    <div class="w-2.5 h-2.5 bg-lime-500 rounded-full mr-1"></div>
                                    <span class="text-white font-semibold text-xs">Proteínas</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-lg font-black text-lime-400 mr-1">{{$proteinsPerMeal}}</span>
                                    <span class="text-xs text-gray-400">gr</span>
                                </div>
                            </div>
                        </div>

                        <!-- Carbohidratos -->
                        <div class="bg-gray-800/50 border border-cyan-500/30 rounded-lg p-2 hover:bg-gray-800/70 transition-all duration-300">
                            <div class="flex flex-col items-center text-center">
                                <div class="flex items-center mb-1">
                                    <div class="w-2.5 h-2.5 bg-cyan-500 rounded-full mr-1"></div>
                                    <span class="text-white font-semibold text-xs">Carbohidratos</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-lg font-black text-cyan-400 mr-1">{{$carbsPerMeal}}</span>
                                    <span class="text-xs text-gray-400">gr</span>
                                </div>
                            </div>
                        </div>

                        <!-- Grasas -->
                        <div class="bg-gray-800/50 border border-yellow-500/30 rounded-lg p-2 hover:bg-gray-800/70 transition-all duration-300">
                            <div class="flex flex-col items-center text-center">
                                <div class="flex items-center mb-1">
                                    <div class="w-2.5 h-2.5 bg-yellow-500 rounded-full mr-1"></div>
                                    <span class="text-white font-semibold text-xs">Grasas</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-lg font-black text-yellow-400 mr-1">{{$fatsPerMeal}}</span>
                                    <span class="text-xs text-gray-400">gr</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Decoración inferior -->
                    <div class="mt-3 flex justify-center">
                        <div class="flex space-x-1">
                            <div class="w-1.5 h-1.5 bg-lime-500 rounded-full animate-pulse"></div>
                            <div class="w-1.5 h-1.5 bg-lime-400 rounded-full animate-pulse" style="animation-delay: 0.1s"></div>
                            <div class="w-1.5 h-1.5 bg-lime-300 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                        </div>
                    </div>
                </div>


                <form>
                <div class="grid grid-cols-4 gap-4">
                    <!-- Columna de Proteínas -->
                    <div class="bg-gray-950 rounded-md p-2">
                        <h3 class="text-center font-bold border-b text-white border-gray-700 pb-2 mb-2">
                            Proteínas<br>(Carnes o Pescados)
                            <div class="text-sm mt-1">
                                <span class="px-2 py-1 rounded {{ $this->proteinsCount >= $maxProteins ? 'bg-red-500' : 'bg-green-500' }} text-white" wire:key="proteins-counter">
                                    {{ $this->proteinsCount }}/{{ $maxProteins }}
                                </span>
                            </div>
                        </h3>
                        <button type="button" class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-1 px-4 mb-2 w-full rounded"
                        wire:click="mostrarModal">
                            + Otro Alimento
                        </button>
                        <!-- Scrollable Content -->
                        <div class="max-h-[70vh] overflow-y-auto  [&::-webkit-scrollbar]:w-2
                        [&::-webkit-scrollbar-track]:bg-gray-100
                        [&::-webkit-scrollbar-thumb]:bg-gray-300
                        dark:[&::-webkit-scrollbar-track]:bg-neutral-700
                        dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
                            @foreach ($foods as $alimento)
                                @if($alimento->type=='Proteinas')
                                    <div class="border-b border-gray-700 py-2 flex flex-row justify-between" wire:key="protein-{{ $alimento->id }}">
                                        <p>{{$alimento->name}}</p>
                                        <input
                                            type="checkbox"
                                            class="peer h-5 w-5 mr-2 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-black checked:border-slate-800 focus:ring-slate-950"
                                            name="protein_{{$alimento->id}}"
                                            id="protein_{{$alimento->id}}"
                                            wire:model.live="proteinsSelect.{{$alimento->id}}"
                                        >
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Columna de Carbohidratos -->
                    <div class="bg-slate-900  rounded-md p-2">
                        <h3 class="text-center font-bold border-b text-cyan-500 border-gray-700 pb-2 mb-2">
                            Carbohidratos<br>(Cereales y Legumbres)
                            <div class="text-sm mt-1">
                                <span class="px-2 py-1 rounded {{ $this->carbsCount >= $maxCarbs ? 'bg-red-500' : 'bg-green-500' }} text-white" wire:key="carbs-counter">
                                    {{ $this->carbsCount }}/{{ $maxCarbs }}
                                </span>
                            </div>
                        </h3>
                        <button type="button" class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-1 px-4 mb-2 w-full rounded"
                        wire:click="mostrarModal">
                            + Otro Alimento
                        </button>
                        <!-- Scrollable Content -->
                        <div class="max-h-[70vh] overflow-y-auto  [&::-webkit-scrollbar]:w-2
                        [&::-webkit-scrollbar-track]:bg-gray-100
                        [&::-webkit-scrollbar-thumb]:bg-gray-300
                        dark:[&::-webkit-scrollbar-track]:bg-neutral-700
                        dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
                            @foreach ($foods as $alimento)
                                @if($alimento->type=='Carbohidratos')
                                <div class="border-b border-gray-700 py-2 flex flex-row justify-between" wire:key="carb-{{ $alimento->id }}">
                                    <p>{{$alimento->name}}</p>
                                    <input
                                        type="checkbox"
                                        class="peer h-5 w-5 mr-2 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800"
                                        name="carb_{{$alimento->id}}"
                                        id="carb_{{$alimento->id}}"
                                        wire:model.live="carbsSelect.{{$alimento->id}}"
                                    >
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Columna de Grasas -->
                    <div class="bg-gray-950 text-white rounded-md p-2">
                        <h3 class="text-center font-bold border-b text-white border-gray-700 pb-2 mb-2">
                            Grasas<br>(Semillas y Lacteos)
                            <div class="text-sm mt-1">
                                <span class="px-2 py-1 rounded {{ $this->fatsCount >= $maxFats ? 'bg-red-500' : 'bg-green-500' }} text-white" wire:key="fats-counter">
                                    {{ $this->fatsCount }}/{{ $maxFats }}
                                </span>
                            </div>
                        </h3>
                        <button type="button" class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-1 px-4 mb-2 w-full rounded"
                        wire:click="mostrarModal">
                            + Otro Alimento
                        </button>
                        <!-- Scrollable Content -->
                        <div class="max-h-[70vh] overflow-y-auto  [&::-webkit-scrollbar]:w-2
                        [&::-webkit-scrollbar-track]:bg-gray-100
                        [&::-webkit-scrollbar-thumb]:bg-gray-300
                        dark:[&::-webkit-scrollbar-track]:bg-neutral-700
                        dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
                            @foreach ($foods as $alimento)
                                @if($alimento->type=='Grasas')
                                    <div class="border-b border-gray-700 py-2 flex flex-row justify-between" wire:key="fat-{{ $alimento->id }}">
                                        <p>{{$alimento->name}}</p>
                                    <input
                                        type="checkbox"
                                        name="fat_{{$alimento->id}}"
                                        id="fat_{{$alimento->id}}"
                                        class="peer h-5 w-5 mr-2 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-black checked:border-slate-800 focus:ring-slate-950"
                                        wire:model.live="fatsSelect.{{$alimento->id}}"
                                    >
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- Columna de frutas -->
                    <div class="bg-slate-900 text-white rounded-md p-2">
                        <h3 class="text-center font-bold border-b text-cyan-500 border-gray-700 p-3 mb-2">
                            Frutas y Vegetales
                            <div class="text-sm mt-1">
                                <span class="px-2 py-1 rounded {{ $this->vegetablesCount >= $maxVegetables ? 'bg-red-500' : 'bg-green-500' }} text-white" wire:key="vegetables-counter">
                                    {{ $this->vegetablesCount }}/{{ $maxVegetables }}
                                </span>
                            </div>
                        </h3>
                        <button type="button" class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-1 px-4 mb-2 w-full rounded"
                        wire:click="mostrarModal">
                            + Otro Alimento
                        </button>
                        <!-- Scrollable Content -->
                        <div class="max-h-[70vh] overflow-y-auto  [&::-webkit-scrollbar]:w-2
                        [&::-webkit-scrollbar-track]:bg-gray-100
                        [&::-webkit-scrollbar-thumb]:bg-gray-300
                        dark:[&::-webkit-scrollbar-track]:bg-neutral-700
                        dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
                            @foreach ($foods as $alimento)
                                @if($alimento->type=='Frutas'||$alimento->type=='Vegetales')
                                    <div class="border-b border-gray-700 py-2 flex flex-row justify-between" wire:key="vegetable-{{ $alimento->id }}">
                                        <p>{{$alimento->name}}</p>
                                    <input
                                        type="checkbox"
                                        name="vegetable_{{$alimento->id}}"
                                        id="vegetable_{{$alimento->id}}"
                                        class="peer h-5 w-5 mr-2 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800"
                                        wire:model.live="vegetablesSelect.{{$alimento->id}}"
                                    >
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>
            </form>
            </div>
        </div>

    </x-app-layout>

</div>
