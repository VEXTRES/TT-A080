<div>
    <x-app-layout>

        <div class="p-4 bg-sky-200 text-white w-full ">
            <div class="flex gap-4"> <!-- Usa gap para añadir separación entre los divs -->
                <div class="text-black bg-white border border-black p-3 mb-2 w-1/3 rounded-md">
                    <h2 class="text-lg font-bold mb-2">{{$numComidas}} Comidas al Día</h2>
                    <p>Cada Comida Contiene:</p>
                    <ul class="list-disc ml-6 mb-4">
                        <li class="font-bold">Proteínas: {{$plan->total_proteins}} Gr</li>
                        <li class="font-bold">Carbohidratos: {{$plan->total_carbs}} Gr</li>
                        <li class="font-bold">Grasas: {{$plan->total_fats}} Gr</li>
                    </ul>
                </div>
                <div class="w-2/3 flex flex-col h-full"> <!-- Asegúrate de que este div ocupe el espacio necesario -->
                    <p class="w-3/5 h-1/3 border mx-auto text-center p-4 rounded-md bg-black text-white flex-grow">{{$plan->name}}</p>

                    <!-- El botón estará alineado abajo y a la derecha -->
                    <button class="border mx h-1/3 p-3 rounded-md border-black ml-auto hidden">Guardar</button>
                </div>

            </div>


            <div class="grid grid-cols-4 gap-4 ">
                <!-- Columna de Proteínas -->
                <div class="bg-black text-white rounded-md p-2">
                    <h3 class="text-center font-bold border-b border-gray-700 pb-2 mb-2">Proteínas<br>(Carnes o Pescados)</h3>
                    <button class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-1 px-4 mb-2 w-full rounded">
                        + Otro Alimento
                    </button>
                    <!-- Scrollable Content -->
                    <div class="max-h-[70vh] overflow-y-auto  [&::-webkit-scrollbar]:w-2
                    [&::-webkit-scrollbar-track]:bg-gray-100
                    [&::-webkit-scrollbar-thumb]:bg-gray-300
                    dark:[&::-webkit-scrollbar-track]:bg-neutral-700
                    dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
                        @foreach ($alimentos as $alimento)
                            @if($alimento->type=='Proteinas')
                                <div class="border-b border-gray-700 py-2">{{$alimento->name}}</div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Columna de Carbohidratos -->
                <div class="bg-gray-800 text-white rounded-md p-2">
                    <h3 class="text-center font-bold border-b border-gray-700 pb-2 mb-2">Carbohidratos<br>(Cereales y Legumbres)</h3>
                    <button class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-1 px-4 mb-2 w-full rounded">
                        + Otro Alimento
                    </button>
                    <!-- Scrollable Content -->
                    <div class="max-h-[70vh] overflow-y-auto  [&::-webkit-scrollbar]:w-2
                    [&::-webkit-scrollbar-track]:bg-gray-100
                    [&::-webkit-scrollbar-thumb]:bg-gray-300
                    dark:[&::-webkit-scrollbar-track]:bg-neutral-700
                    dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
                        @foreach ($alimentos as $alimento)
                            @if($alimento->type=='Carbohidratos')
                                <div class="border-b border-gray-700 py-2">{{$alimento->name}}</div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Columna de Grasas -->
                <div class="bg-gray-800 text-white rounded-md p-2">
                    <h3 class="text-center font-bold border-b border-gray-700 pb-2 mb-2">Grasas<br>(Semillas y Lacteos)</h3>
                    <button class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-1 px-4 mb-2 w-full rounded">
                        + Otro Alimento
                    </button>
                    <!-- Scrollable Content -->
                    <div class="max-h-[70vh] overflow-y-auto  [&::-webkit-scrollbar]:w-2
                    [&::-webkit-scrollbar-track]:bg-gray-100
                    [&::-webkit-scrollbar-thumb]:bg-gray-300
                    dark:[&::-webkit-scrollbar-track]:bg-neutral-700
                    dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
                        @foreach ($alimentos as $alimento)
                            @if($alimento->type=='Lácteos')
                                <div class="border-b border-gray-700 py-2">{{$alimento->name}}</div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <!-- Columna de frutas -->
                <div class="bg-gray-800 text-white rounded-md p-2">
                    <h3 class="text-center font-bold border-b border-gray-700 pb-2 mb-2">Carbohidratos<br>(Cereales y Legumbres)</h3>
                    <button class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-1 px-4 mb-2 w-full rounded">
                        + Otro Alimento
                    </button>
                    <!-- Scrollable Content -->
                    <div class="max-h-[70vh] overflow-y-auto  [&::-webkit-scrollbar]:w-2
                    [&::-webkit-scrollbar-track]:bg-gray-100
                    [&::-webkit-scrollbar-thumb]:bg-gray-300
                    dark:[&::-webkit-scrollbar-track]:bg-neutral-700
                    dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
                        @foreach ($alimentos as $alimento)
                            @if($alimento->type=='Frutas'||$alimento->type=='Vegetales')
                                <div class="border-b border-gray-700 py-2">{{$alimento->name}}</div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>



    </x-app-layout>
</div>
