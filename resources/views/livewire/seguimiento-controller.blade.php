<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-white text-center leading-tight">
                {{ __('Mis Seguimientos') }}
            </h2>
        </x-slot>
        <div class="w-full bg-[#232931] min-h-screen">

        @if ($meal_plans->isEmpty())
            <div class="flex pt-4">
                <p class="bg-white rounded-md p-4 ml-4">No hay plan de Posible creacion de seguimiento disponibles. Debe crear un plan</p>
            </div>
        @else

        <div class=" {{$showModal===true?'fixed inset-0 bg-black/50 backdrop-blur-sm ':''}}  ">
            <div class="absolute m-auto  mt-6 w-3/4 min-h-screen inset-0 overflow-y-auto
                [&::-webkit-scrollbar]:w-2
                [&::-webkit-scrollbar-track]:rounded-full
                [&::-webkit-scrollbar-track]:bg-gray-100
                [&::-webkit-scrollbar-thumb]:rounded-full
                [&::-webkit-scrollbar-thumb]:bg-gray-300
                dark:[&::-webkit-scrollbar-track]:bg-neutral-700
                dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500"
                style="display: {{ $showModal === true ? 'block' : 'none' }} ;">{{-- {{ $showModal === true ? 'block' : 'none' }} --}}
                    <div class="bg-slate-800 p-8 rounded-lg shadow-lg mb-10"
                    @click.outside="$wire.call('mostrarModal')">
                        <!-- Modal Content -->
                        <div class="flex flex-col ">
                            <div class="flex justify-between">
                                <h2 class="text-xl font-semibold mx-auto text-white">Nuevo Seguimiento</h2>
                                <button wire:click="mostrarModal" class="text-white p-3 rounded-md bg-slate-600 hover:bg-slate-700 hover:text-gray-300">&times;</button>
                            </div>
                            <div class="mt-6">
                                <p class="text-white">Fecha: {{$fecha}}</p>
                            </div>
                        </div>

                        <div class="flex flex-col items-center mt-4 ">
                            @foreach ($meal_plans as $meal_plan)
                                @if ($meal_plan->is_active)
                                    <p class="text-lg font-bold text-blue-400">{{$meal_plan->name}} (Plan Actual Activo)</p>
                                    <label for="observaciones" class="mt-6 text-white">Observaciones o Cambios Notados</label>
                                    <textarea id="observaciones"
                                        wire:model="observaciones"
                                        class="w-full sm:w-3/4 md:w-2/3 lg:w-1/2 min-h-[150px]
                                        mt-2 placeholder:text-white placeholder:text-center
                                        bg-slate-600 text-white text-sm rounded-lg
                                        focus:ring-blue-500 focus:border-blue-500 block p-2.5
                                        dark:bg-gray-700 dark:border-gray-600
                                        dark:placeholder-gray-400 dark:text-white
                                        dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Escribe Aquí tus Observaciones o Cambios Notados">
                                    </textarea>

                                    <div>
                                        @if (session()->has('message'))
                                            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                                                {{ session('message') }}
                                            </div>
                                        @endif

                                        <div class="mt-6 space-y-4">
                                            <div class="inline-flex gap-3">
                                                <label class="text-slate-950 bg-blue-300 hover:bg-blue-200 hover:text-slate-900 font-bold cursor-pointer p-2 rounded-md inline-flex ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                                    </svg>
                                                    Subir Fotos
                                                    <input
                                                        type="file"
                                                        wire:model="photos"
                                                        class="hidden"
                                                        multiple
                                                        accept="image/*"
                                                    >
                                                </label>

                                                <button
                                                    type="button"
                                                    wire:click="crearSeguimiento"
                                                    class="px-4 py-2 bg-slate-950 text-blue-400 rounded-lg hover:bg-slate-900 hover:text-blue-300"
                                                    wire:loading.attr="disabled"
                                                >
                                                    <span wire:loading.remove wire:target="crearSeguimiento">Subir</span>
                                                    <span wire:loading wire:target="crearSeguimiento">Subiendo...</span>
                                                </button>
                                            </div>

                                            @error('photos.*')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror

                                            @if(count($tempImages) > 0)
                                                <div class="mt-4 ">
                                                    <p class="text-sm text-gray-600 mb-2">Vistas previas:</p>
                                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                                        @foreach($tempImages as $index => $image)
                                                            <div class="relative group">
                                                                <img
                                                                    src="{{ $image['temporaryUrl'] }}"
                                                                    class="w-full h-48 object-cover rounded-lg"
                                                                    alt="Vista previa"
                                                                >
                                                                <button
                                                                    wire:click="removeImage({{ $index }})"
                                                                    class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition-opacity"
                                                                >
                                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                @endif
                            @endforeach
                        </div>
                    </div>
            </div>
        </div>


        <div class="container mx-auto px-4">
            <!-- Botón Crear Seguimiento -->
            <div class="flex gap-4 justify-center sm:justify-start">
                <button type="button"
                    class="inline-flex items-center mt-4 px-6 py-2 border border-transparent text-sm font-medium rounded-md
                    bg-slate-950 text-cyan-600 hover:bg-black"
                    wire:click="mostrarModal">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <p>Crear Seguimiento</p>
                </button>
            </div>

            <!-- Contenedor principal -->
            <div class="bg-[#232931] max-w-4xl mx-auto shadow-lg p-4 mt-4 rounded-lg">
                <!-- Input de búsqueda -->
                <div class="flex items-center justify-center sm:justify-end">
                    <input type="search" id="search" placeholder="Buscar..."
                        class="w-full sm:w-64 h-10 bg-gray-900 text-lime-500 hover:bg-slate-950 border-none text-[10pt] rounded-md
                        shadow-lg placeholder-[#50d890] px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9 ml-2 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </div>

                <!-- Lista de Seguimientos -->
                <div class="mt-6">
                    <ul class="space-y-4">
                        @foreach ($mealPlanIds as $key => $mealPlanId)
                        <li class="border-l-2 border-dashed border-white pl-4">
                            <div class="inline-flex w-full items-center justify-between text-white font-semibold">
                                <p>ID: {{$key}}</p>
                                <button type="button" wire:click="deleteTracking({{$key}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mt-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </div>
                            <p class="text-[#50d890] text-lg">{{$mealPlanId}}</p>
                            <a href="{{ route('seguimiento.detalles', $key) }}" class="inline-flex items-center border border-black bg-gray-900 text-cyan-600 hover:bg-slate-950 p-2 rounded-lg gap-2 mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                </svg>
                                <p>Ver Detalles</p>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>


        @endif


        </div>

    </x-app-layout>
</div>

<script>
    document.getElementById('fotos').addEventListener('change', function(event) {
    const files = event.target.files; // Obtener todos los archivos seleccionados
    const previewContainer = document.getElementById('preview-container');
    const previewImagesContainer = document.getElementById('preview-images');

    // Limpiar el contenedor de vistas previas
    previewImagesContainer.innerHTML = '';

    if (files.length > 0) {
        // Mostrar el contenedor de vistas previas
        previewContainer.classList.remove('hidden');

        // Recorrer cada archivo seleccionado
        for (const file of files) {
            const reader = new FileReader(); // Crear un FileReader para leer el archivo

            // Cuando el archivo se haya leído, agregar la vista previa
            reader.onload = function(e) {
                const img = document.createElement('img'); // Crear un elemento <img>
                img.src = e.target.result; // Establecer la URL de datos como src
                img.alt = "Vista previa de la imagen"; // Texto alternativo
                img.classList.add('max-w-full', 'h-auto', 'max-h-48', 'rounded-md'); // Estilos
                previewImagesContainer.appendChild(img); // Agregar la imagen al contenedor
            };

            reader.readAsDataURL(file); // Leer el archivo como una URL de datos
        }
    } else {
        // Ocultar el contenedor si no hay archivos seleccionados
        previewContainer.classList.add('hidden');
    }
});
</script>
