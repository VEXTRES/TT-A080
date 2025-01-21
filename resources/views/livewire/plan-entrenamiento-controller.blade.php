<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $workoutPlan ? $workoutPlan->name : 'Plan no encontrado' }}
            </h2>
        </x-slot>

        <div class="h-screen w-full">
            <div class="overflow-x-auto mx-10 my-10">
                <!-- Título del día -->
                <div class="bg-cyan-900 text-white text-center p-2">
                    <h2 class="text-lg font-bold">Día 1 (Espalda y Pecho)</h2>
                </div>

                <!-- Contenedor de la cuadrícula -->
                <div class="grid grid-cols-5 border border-gray-300">
                    <!-- Encabezados -->
                    <div class="bg-cyan-600 p-2 font-semibold text-center border border-gray-300">músculo</div>
                    <div class="bg-cyan-600 p-2 font-semibold text-center border border-gray-300">nombre</div>
                    <div class="bg-cyan-600 p-2 font-semibold text-center border border-gray-300">series</div>
                    <div class="bg-cyan-600 p-2 font-semibold text-center border border-gray-300">repeticiones</div>
                    <div class="bg-cyan-600 p-2 font-semibold text-center border border-gray-300">ejemplo</div>

                    <!-- Fila 1 -->
                    @foreach ($exercises as $exercise)
                         @if($exercise['type']=='pecho' || $exercise['type']=='espalda')
                            <div class="p-2 text-center bg-blue-100 border border-gray-300">{{$exercise['type']}}</div>
                            <div class="p-2 text-center border border-gray-300">{{$exercise['name']}}</div>
                            <div class="p-2 text-center border border-gray-300">{{$exercise['series']}}</div>
                            <div class="p-2 text-center border border-gray-300">{{$exercise['reps']}}</div>
                            <div class="p-2 text-center border border-gray-300 text-blue-500 underline">
                                <a href="#">ver</a>
                            </div>
                         @endif
                    @endforeach
                </div>
            </div>

            <div class="overflow-x-auto mx-10 my-10">
                <!-- Título del día -->
                <div class="bg-cyan-900 text-white text-center p-2">
                    <h2 class="text-lg font-bold">Día 2 (Cuadricep)</h2>
                </div>

                <!-- Contenedor de la cuadrícula -->
                <div class="grid grid-cols-5 border border-gray-300">
                    <!-- Encabezados -->
                    <div class="bg-cyan-600 p-2 font-semibold text-center border border-gray-300">músculo</div>
                    <div class="bg-cyan-600 p-2 font-semibold text-center border border-gray-300">nombre</div>
                    <div class="bg-cyan-600 p-2 font-semibold text-center border border-gray-300">series</div>
                    <div class="bg-cyan-600 p-2 font-semibold text-center border border-gray-300">repeticiones</div>
                    <div class="bg-cyan-600 p-2 font-semibold text-center border border-gray-300">ejemplo</div>

                    @foreach ($exercises as $exercise)
                        @if ($exercise['type']=='cuadricep')
                            <div class="p-2 text-center bg-blue-100 border border-gray-300">{{$exercise['type']}}</div>
                            <div class="p-2 text-center border border-gray-300">{{$exercise['name']}}</div>
                            <div class="p-2 text-center border border-gray-300">{{$exercise['series']}}</div>
                            <div class="p-2 text-center border border-gray-300">{{$exercise['reps']}}</div>
                            <div class="p-2 text-center border border-gray-300 text-blue-500 underline">
                                <a href="#">ver</a>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>

            <div class="overflow-x-auto mx-10 my-10">
                <!-- Título del día -->
                <div class="bg-cyan-900 text-white text-center p-2">
                    <h2 class="text-lg font-bold">Día 3 (Bicep, Tricep y Hombro)</h2>
                </div>

                <!-- Contenedor de la cuadrícula -->
                <div class="grid grid-cols-5 border border-gray-300">
                    <!-- Encabezados -->
                    <div class="bg-cyan-600 p-2 font-semibold text-center border border-gray-300">músculo</div>
                    <div class="bg-cyan-600 p-2 font-semibold text-center border border-gray-300">nombre</div>
                    <div class="bg-cyan-600 p-2 font-semibold text-center border border-gray-300">series</div>
                    <div class="bg-cyan-600 p-2 font-semibold text-center border border-gray-300">repeticiones</div>
                    <div class="bg-cyan-600 p-2 font-semibold text-center border border-gray-300">ejemplo</div>

                    @foreach ($exercises as $exercise)
                        @if ($exercise['type']=='bicep'|| $exercise['type']=='tricep'|| $exercise['type']=='hombro')
                            <div class="p-2 text-center bg-blue-100 border border-gray-300">{{$exercise['type']}}</div>
                            <div class="p-2 text-center border border-gray-300">{{$exercise['name']}}</div>
                            <div class="p-2 text-center border border-gray-300">{{$exercise['series']}}</div>
                            <div class="p-2 text-center border border-gray-300">{{$exercise['reps']}}</div>
                            <div class="p-2 text-center border border-gray-300 text-blue-500 underline">
                                <a href="#">ver</a>
                            </div>
                        @endif
                    @endforeach



                </div>
            </div>

            <div class="overflow-x-auto mx-10 my-10">
                <!-- Título del día -->
                <div class="bg-cyan-900 text-white text-center p-2">
                    <h2 class="text-lg font-bold">Día 4 (Gluteo y Pantorrilla)</h2>
                </div>

                <!-- Contenedor de la cuadrícula -->
                <div class="grid grid-cols-5 border border-gray-300">
                    <!-- Encabezados -->
                    <div class="bg-cyan-600 p-2 font-semibold text-center border border-gray-300">músculo</div>
                    <div class="bg-cyan-600 p-2 font-semibold text-center border border-gray-300">nombre</div>
                    <div class="bg-cyan-600 p-2 font-semibold text-center border border-gray-300">series</div>
                    <div class="bg-cyan-600 p-2 font-semibold text-center border border-gray-300">repeticiones</div>
                    <div class="bg-cyan-600 p-2 font-semibold text-center border border-gray-300">ejemplo</div>

                    @foreach ($exercises as $exercise)
                        @if ($exercise['type']=='gluteo'||$exercise['type']=='pantorrilla')
                            <div class="p-2 text-center bg-blue-100 border border-gray-300">{{$exercise['type']}}</div>
                            <div class="p-2 text-center border border-gray-300">{{$exercise['name']}}</div>
                            <div class="p-2 text-center border border-gray-300">{{$exercise['series']}}</div>
                            <div class="p-2 text-center border border-gray-300">{{$exercise['reps']}}</div>
                            <div class="p-2 text-center border border-gray-300 text-blue-500 underline">
                                <a href="#">ver</a>
                            </div>
                        @endif
                    @endforeach


                </div>
            </div>

            <div class="overflow-x-auto mx-10 my-10 ">
                <!-- Título del día -->
                <div class="bg-cyan-900 text-white text-center p-2">
                    <h2 class="text-lg font-bold">Día 5 (Abdomen)</h2>
                </div>

                <!-- Contenedor de la cuadrícula -->
                <div class="grid grid-cols-5 border border-gray-300 mb-10">
                    <!-- Encabezados -->
                    <div class="bg-cyan-600 p-2 font-semibold text-center border border-gray-300">músculo</div>
                    <div class="bg-cyan-600 p-2 font-semibold text-center border border-gray-300">nombre</div>
                    <div class="bg-cyan-600 p-2 font-semibold text-center border border-gray-300">series</div>
                    <div class="bg-cyan-600 p-2 font-semibold text-center border border-gray-300">repeticiones</div>
                    <div class="bg-cyan-600 p-2 font-semibold text-center border border-gray-300">ejemplo</div>

                    @foreach ($exercises as $exercise)
                        @if ($exercise['type']=='abdomen')
                            <div class="p-2 text-center bg-blue-100 border border-gray-300">{{$exercise['type']}}</div>
                            <div class="p-2 text-center border border-gray-300">{{$exercise['name']}}</div>
                            <div class="p-2 text-center border border-gray-300">{{$exercise['series']}}</div>
                            <div class="p-2 text-center border border-gray-300">{{$exercise['reps']}}</div>
                            <div class="p-2 text-center border border-gray-300 text-blue-500 underline">
                                <a href="#">ver</a>
                            </div>
                        @endif

                    @endforeach

                </div>
            </div>




        </div>
    </x-app-layout>
</div>
