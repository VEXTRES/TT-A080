<div>

    <x-app-layout>
        <div x-data="{showNotification: false}">
            {{--               --}}
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
                <div class="flex gap-4"> <!-- Usa gap para añadir separación entre los divs -->
                    <div class="bg-gray-900  border border-black p-3 mb-2 w-1/3 rounded-md">
                        <h2 class="text-lg font-bold text-lime-500 mb-2">Comida {{$currentFood}} del Día</h2>
                        <p>Cada Comida Contiene:</p>
                        <ul class="list-disc ml-6 mt-2 mb-4 flex flex-col">
                            <div class="inline-flex gap-3"><li class="font-bold">Proteínas:</li> <p class="text-lime-500 font-bold">{{$proteinsPerMeal}} Gr</p></div>
                            <div class="inline-flex gap-3"><li class="font-bold">Carbohidratos:</li> <p class="text-lime-500 font-bold">{{$carbsPerMeal}} Gr</p></div>
                            <div class="inline-flex gap-3"><li class="font-bold">Grasas:</li> <p class="text-lime-500 font-bold">{{$fatsPerMeal}} Gr</p></div>
                        </ul>
                    </div>
                    <div class="w-2/3 flex flex-col h-full">
                        <p class="w-3/5 h-1/3 border mx-auto text-center p-2 rounded-md bg-gray-950 text-white flex-grow">{{$plan->name}}</p>

                        <button
                        class="inline-flex w-1/5 gap-2 h-12 ml-auto mt-12 animate-shimmer items-center justify-center rounded-md border bg-gray-900 border-lime-500"
                        wire:click="crearComida"
                        x-on:click="showNotification = true, setTimeout(()=>showNotification=false, 2000)">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5" />
                          </svg>

                            <p>Crear Comida</p>
                        </button>
                    </div>

                </div>

                <form >
                <div class="grid grid-cols-4 gap-4 ">
                    <!-- Columna de Proteínas -->

                    <div class="bg-gray-950 rounded-md p-2">
                        <h3 class="text-center font-bold border-b text-white border-gray-700 pb-2 mb-2">Proteínas<br>(Carnes o Pescados)</h3>
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
                                    <div class="border-b border-gray-700 py-2 flex flex-row justify-between">
                                        <p>{{$alimento->name}}</p>
                                        <input  type="checkbox"   class="peer h-5 w-5 mr-2 cursor-pointer transition-all
                                        appearance-none rounded shadow
                                        hover:shadow-md
                                        border border-slate-300
                                        checked:bg-black
                                        checked:border-slate-800
                                        focus:ring-slate-950"
                                        name="{{$alimento->id}}"
                                        id="{{$alimento->id}}"
                                        value="{{$alimento->id}}"
                                        wire:model="proteinsSelect.{{$alimento->id}}">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Columna de Carbohidratos -->
                    <div class="bg-slate-900  rounded-md p-2">
                        <h3 class="text-center font-bold border-b text-cyan-500 border-gray-700 pb-2 mb-2">Carbohidratos<br>(Cereales y Legumbres)</h3>
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
                                <div class="border-b border-gray-700 py-2 flex flex-row justify-between">
                                    <p>{{$alimento->name}}</p>
                                    <input  type="checkbox" class="peer h-5 w-5 mr-2 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800"
                                    name="{{$alimento->id}}"
                                    id="{{$alimento->id}}"
                                    wire:model="carbsSelect.{{$alimento->id}}">
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Columna de Grasas -->
                    <div class="bg-gray-950 text-white rounded-md p-2">
                        <h3 class="text-center font-bold border-b text-white border-gray-700 pb-2 mb-2">Grasas<br>(Semillas y Lacteos)</h3>
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
                                    <div class="border-b border-gray-700 py-2 flex flex-row justify-between">
                                        <p>{{$alimento->name}}</p>
                                    <input type="checkbox" name="{{$alimento->id}}" id="{{$alimento->id}}"
                                    class="peer h-5 w-5 mr-2 cursor-pointer transition-all
                                        appearance-none rounded shadow
                                        hover:shadow-md
                                        border border-slate-300
                                        checked:bg-black
                                        checked:border-slate-800
                                        focus:ring-slate-950"
                                    wire:model="fatsSelect.{{$alimento->id}}"
                                    >
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- Columna de frutas -->
                    <div class="bg-slate-900 text-white rounded-md p-2">
                        <h3 class="text-center font-bold border-b text-cyan-500 border-gray-700 p-3 mb-2">Frutas y Vegetales</h3>
                        <button type="button" type="button" class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-1 px-4 mb-2 w-full rounded"
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
                                    <div class="border-b border-gray-700 py-2 flex flex-row justify-between">
                                        <p>{{$alimento->name}}</p>
                                    <input type="checkbox" name="{{$alimento->id}}" id="{{$alimento->id}}"
                                    class="peer h-5 w-5 mr-2 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800"
                                    wire:model="vegetablesSelect.{{$alimento->id}}"
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
