<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Seguimiento') }}
            </h2>
        </x-slot>


        <div class="w-full">

        @if ($meal_plans->isEmpty())
            <div>
                <p>No hay plan de Posible creacion de seguimiento disponibles. Debe crear un plan</p>
            </div>
        @else

        <div class=" {{$showModal===true?'fixed inset-0 bg-black/50 backdrop-blur-sm ':''}}  ">
            <div class="absolute m-auto mt-6 w-3/4 inset-0"
            style="display: {{ $showModal === true ? 'block' : 'none' }} ;">{{-- {{ $showModal === true ? 'block' : 'none' }} --}}
                <div class="bg-slate-800 p-8 rounded-lg shadow-lg"
                @click.outside="$wire.call('mostrarModal')">
                    <!-- Modal Content -->
                    <div class="flex flex-col ">
                        <div class="flex justify-between">
                            <h2 class="text-xl font-semibold mx-auto text-white">Crear Seguimiento</h2>
                            <button wire:click="mostrarModal" class="text-white p-3 rounded-md bg-slate-600 hover:text-gray-300">&times;</button>
                        </div>
                        <div class="mt-6">
                            <p class="text-white">Fecha: {{$fecha}}</p>
                        </div>
                    </div>

                    <div class="flex flex-col items-center mt-4">
                        @foreach ($meal_plans as $meal_plan)
                            @if ($meal_plan->is_active)
                                <p class="text-lg font-bold text-blue-400">{{$meal_plan->name}} (Plan Actual Activo)</p>
                                <label for="observaciones" class="mt-6 text-white">Observaciones o Cambios Notados</label>
                                <textarea  type="text" id="observaciones" rows="5" cols="50" class="mt-2 placeholder:text-white placeholder:text-center txt bg-slate-600 text-white text-sm rounded-lg
                                 focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600
                                 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                 placeholder="Escribe Aqui tu Observaciones o Cambios Notados"></textarea>
                                 <label class="mt-6 inline-flex gap-3 text-slate-700 font-bold cursor-pointer p-2 rounded-md bg-blue-300 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                      </svg>
                                      Subir Foto
                                    <input type="file" name="foto" id="foto"
                                    accept="image/*"
                                    class="hidden">
                                 </label>

                            @endif
                        @endforeach
                    </div>

                </div>
            </div>
        </div>


            <div>
                <div class="flex gap-4 mt-4 ml-3">
                    <button type="button"
                    class="inline-flex items-center px-6 gap-2 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white
                    bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150"
                    wire:click="mostrarModal">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <p class="">Crear Seguimiento</p>
                    </button>
                </div>
                <div>

                </div>
            </div>

        @endif


        </div>

    </x-app-layout>
</div>
