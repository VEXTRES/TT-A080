<div x-data="{
    sortOrderAlimentacion: true,
    sortOrderEntrenamiento:true,
    showAlert: true,
}">
    @auth
    <x-app-layout>
        <div class=" w-full bg-[#232931] ">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-center text-white leading-tight">
                    {{ __('Mis Planes') }}
                </h2>
            </x-slot>
            <div class="{{$showConfirmationModal===true?'fixed inset-0 bg-black/70 backdrop-blur-sm z-50':''}}"
            style="display: {{ $showConfirmationModal === true ? 'block' : 'none' }};">
            <div class="absolute m-auto mt-6 w-4/5 max-w-4xl max-h-screen overflow-y-auto inset-0
                    [&::-webkit-scrollbar]:w-2
                    [&::-webkit-scrollbar-track]:rounded-full
                    [&::-webkit-scrollbar-track]:bg-gray-100
                    [&::-webkit-scrollbar-thumb]:rounded-full
                    [&::-webkit-scrollbar-thumb]:bg-gray-300
                    dark:[&::-webkit-scrollbar-track]:bg-neutral-700
                    dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">

                    <div class="bg-slate-800 p-8 rounded-lg shadow-xl border border-slate-600">
                        <!-- Header del Modal -->
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8 text-yellow-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>
                                Aviso Importante
                            </h2>
                            <button wire:click="cerrarConfirmacion"
                                    class="text-gray-400 hover:text-white p-2 rounded-md bg-slate-700 hover:bg-slate-600 transition-colors">
                                &times;
                            </button>
                        </div>

                        <!-- Contenido del Modal -->
                        <div class="space-y-6 text-gray-200">

                            <!-- Aviso Médico -->
                            <div class="bg-red-900/30 border border-red-500 rounded-lg p-4">
                                <h3 class="text-lg font-semibold text-red-400 mb-3 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                    Descargo de Responsabilidad Médica
                                </h3>
                                <div class="space-y-2 text-sm">
                                    <p>• <strong>Este plan NO sustituye el consejo médico profesional.</strong></p>
                                    <p>• Si tienes alguna condición médica, embarazo, lactancia, diabetes, hipertensión, problemas cardíacos, trastornos alimentarios o cualquier otra condición de salud, <strong>consulta a tu médico antes de seguir cualquier plan</strong>.</p>
                                    <p>• No nos hacemos responsables por efectos adversos derivados del uso de esta aplicación.</p>
                                    <p>• En caso de sentir malestar, suspende el plan y consulta a un profesional de la salud.</p>
                                </div>
                            </div>

                            <!-- Aviso de Privacidad -->
                            <div class="bg-blue-900/30 border border-blue-500 rounded-lg p-4">
                                <h3 class="text-lg font-semibold text-blue-400 mb-3 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.623 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                                    </svg>
                                    Aviso de Privacidad
                                </h3>
                                <div class="space-y-2 text-sm">
                                    <p>• Tus datos personales serán utilizados únicamente para crear tu plan personalizado de alimentación y entrenamiento.</p>
                                    <p>• La información proporcionada se mantendrá confidencial y no será compartida con terceros.</p>
                                    <p>• Puedes solicitar la eliminación de tus datos en cualquier momento.</p>
                                    <p>• Al continuar, aceptas nuestros términos y condiciones de uso.</p>
                                </div>
                            </div>

                            <!-- Información del Plan -->
                            <div class="bg-green-900/30 border border-green-500 rounded-lg p-4">
                                <h3 class="text-lg font-semibold text-green-400 mb-3 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                    </svg>
                                    Información del Plan
                                </h3>
                                <div class="space-y-2 text-sm">
                                    <p>• El plan se genera basado en la información que proporciones en el cuestionario.</p>
                                    <p>• Es importante responder todas las preguntas de manera honesta y precisa.</p>
                                    <p>• El plan incluirá recomendaciones de alimentación y ejercicio personalizadas.</p>
                                    <p>• Puedes modificar o eliminar tu plan en cualquier momento.</p>
                                </div>
                            </div>

                            <!-- Checkbox de Confirmación -->
                            <div class="space-y-4">
                                <label class="flex items-start gap-3 cursor-pointer">
                                    <input type="checkbox" wire:model="aceptaTerminos"
                                            class="mt-1 w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                    <span class="text-sm">
                                        <strong>He leído y acepto</strong> el descargo de responsabilidad médica y entiendo que debo consultar a un profesional de la salud si tengo alguna condición médica.
                                    </span>
                                </label>

                                <label class="flex items-start gap-3 cursor-pointer">
                                    <input type="checkbox" wire:model="aceptaPrivacidad"
                                            class="mt-1 w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                    <span class="text-sm">
                                        <strong>Acepto el aviso de privacidad</strong> y el tratamiento de mis datos personales conforme a los términos descritos.
                                    </span>
                                </label>

                                <label class="flex items-start gap-3 cursor-pointer">
                                    <input type="checkbox" wire:model="confirmaInformacion"
                                            class="mt-1 w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                    <span class="text-sm">
                                        <strong>Confirmo</strong> que proporcionaré información veraz y completa en el cuestionario.
                                    </span>
                                </label>
                            </div>

                            @if($errorConfirmacion)
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                                    <p><span class="font-bold">¡Error!</span> {{ $errorConfirmacion }}</p>
                                </div>
                            @endif
                        </div>

                        <!-- Botones -->
                        <div class="flex justify-end gap-4 mt-8">
                            <button wire:click="cerrarConfirmacion"
                                    class="px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                                Cancelar
                            </button>
                            <button wire:click="confirmarYContinuar"
                                    class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-semibold">
                                Acepto y Continuar
                            </button>
                        </div>
                    </div>
            </div>

        </div>
            <div class=" {{$showModal===true?'fixed inset-0 bg-black/50 backdrop-blur-sm':''}}  ">
                <div class="absolute m-auto mt-6 w-3/4 max-h-screen  overflow-y-auto inset-0
                [&::-webkit-scrollbar]:w-2
                        [&::-webkit-scrollbar-track]:rounded-full
                        [&::-webkit-scrollbar-track]:bg-gray-100
                        [&::-webkit-scrollbar-thumb]:rounded-full
                        [&::-webkit-scrollbar-thumb]:bg-gray-300
                        dark:[&::-webkit-scrollbar-track]:bg-neutral-700
                        dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500"
                @click.outside="$wire.call('MostrarModal')"
                style="display: {{ $showModal === true ? 'block' : 'none' }} ;">{{-- {{ $showModal === true ? 'block' : 'none' }} --}}
                    <div class="bg-slate-800 p-8 rounded-lg shadow-lg">

                        <!-- Modal Content -->
                        <div class="flex flex-col ">
                            <div class="flex justify-between">
                                <h2 class="text-xl font-semibold mx-auto text-white">Sondeo preguntas</h2>
                                <button wire:click="MostrarModal" class="text-white p-3 rounded-md bg-slate-600 hover:bg-slate-700 hover:text-gray-300">&times;</button>
                            </div>
                            <div class="mx-auto w-full">
                                @if (session('success'))
                                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" x-show="showAlert">
                                        <p class="font-bold">¡Éxito!</p>
                                        <p>{{ session('success') }}</p>
                                    </div>
                                @endif

                                @if (session('failed'))
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" x-show="showAlert">
                                        <p><span class="font-bold">¡Error!</span> {{ session('failed') }}</p>
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                                        <p class="font-bold">Faltan campos por completar:</p>
                                        <ul class="list-disc list-inside mt-2">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <!-- Mensaje de error de validación de página -->
                                @if ($pageValidationError)
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                                        <p><span class="font-bold">¡Error! Debes responder todas las preguntas antes de continuar:</span></p>
                                        <p>{{ $pageValidationError }}</p>
                                    </div>
                                @endif
                            </div>

                        </div>
                        <form wire:submit="CrearPlan" x-on:submit="showAlert = true, setTimeout(()=>showAlert=false, 2000)">
                            @if ($this->isLastPage())
                            <div class="flex justify-end mt-3">
                                <button type="submit"
                                        class=" px-4 py-2 bg-slate-950 text-blue-400 font-black rounded-lg hover:bg-gray-900 hover:text-blue-400">
                                    Crear Plan
                                </button>
                            </div>
                            @endif
                            @if (!empty($questionsPaginated))
                                @foreach ($questionsPaginated as $questionId => $questionName)
                                    <p class="my-3 text-center text-white">{{ $questionName }}</p>
                                    @switch($questionId)
                                        @case(1)
                                            <div class="flex justify-center">
                                                <select name="select{{$questionId}}"
                                            id="select{{$questionId}}"
                                            class="bg-gray-50 border justify-center w-1/3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            wire:model="answersSelected.{{1}}"
                                            >
                                                <option value="">Selecciona una edad</option>
                                                    @for ($i = 18; $i <= 45; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                            </select>
                                            </div>
                                            @break
                                        @case(2)
                                            <div class="flex justify-center">
                                                <select name="select{{$questionId}}" id="select{{$questionId}}"
                                                wire:model="answersSelected.{{2}}"
                                                class="bg-gray-50 border justify-center w-1/3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                >
                                                <option value="">Selecciona tu Peso (KG)</option>
                                                    @for ($i = 20; $i <= 150; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            @break
                                        @case(3)
                                            <div class="flex justify-center">
                                                <select name="select{{$questionId}}" id="select{{$questionId}}"
                                                wire:model="answersSelected.{{3}}"
                                                class="bg-gray-50 border justify-center w-1/3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                >
                                            <option value="">Selecciona tu Altura (CM)</option>
                                                @for ($i = 120; $i <= 250; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor

                                            </select>
                                            </div>
                                            @break
                                            @case(4)
                                            <div class="flex gap-4 w-full max-w-md mx-auto">
                                                @foreach ($options[$questionId] as $optionId => $optionName)
                                                    <div class="relative flex-1">
                                                        <input
                                                            id="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                            name="radioAnswer_{{ $questionId }}"
                                                            type="radio"
                                                            value="{{ $optionId }}"
                                                            wire:model="answersSelected.{{ 4 }}"
                                                            class="peer sr-only"
                                                        >
                                                        <label
                                                            for="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                            class="flex items-center justify-center w-full px-4 py-3 gap-2 border-2 border-gray-200 rounded-lg dark:border-gray-700 cursor-pointer
                                                                   peer-checked:border-blue-500 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/20
                                                                   hover:bg-gray-50 dark:hover:bg-gray-800 transition-all duration-200
                                                                   peer-checked:ring-2 peer-checked:ring-blue-500 peer-checked:ring-opacity-50"
                                                        >
                                                            <span class="text-sm text-center w-full font-medium text-gray-900 dark:text-gray-300">
                                                                {{ $optionName }}
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @break
                                            @case(5)
                                            <div class="flex gap-4 w-full">
                                                @foreach ($options[$questionId] as $optionId => $optionName)
                                                    <div class="relative flex-1">
                                                        <input
                                                            id="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                            name="radioAnswer_{{ $questionId }}"
                                                            type="radio"
                                                            value="{{ $optionId }}"
                                                            wire:model="answersSelected.{{ 5 }}"
                                                            class="peer sr-only"
                                                        >
                                                        <label
                                                            for="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                            class="flex items-center justify-center w-full px-2 py-2 gap-2 border-2 border-gray-200 rounded-lg dark:border-gray-700 cursor-pointer
                                                                   peer-checked:border-blue-500 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/20
                                                                   hover:bg-gray-50 dark:hover:bg-gray-800 transition-all duration-200 min-h-[80px]
                                                                   peer-checked:ring-2 peer-checked:ring-blue-500 peer-checked:ring-opacity-50"
                                                        >
                                                            <span class="text-sm text-center w-full p-2 font-medium text-gray-900 dark:text-gray-300">
                                                                {{ $optionName }}
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @break
                                        @case(6)
                                            <div class="mb-6">
                                                <input type="text"
                                                id="success"
                                                name="input{{$questionId}}"
                                                wire:model="answersSelected.{{6}}"
                                                placeholder="Escribe Aqui el nombre de los alimentos a los que eres alergico"
                                                class="bg-slate-600 text-center border border-green-300 text-white placeholder-slate-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 placeholder="Success input">
                                            </div>
                                            @break
                                        @case(7)
                                            <div class="flex justify-center">
                                                <select name="select{{$questionId}}" id="select{{$questionId}}"
                                                wire:model="answersSelected.{{7}}"
                                                class="bg-gray-50 border justify-center w-1/3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                >
                                                    <option value="">Selecciona</option>
                                                        @for ($i = 2; $i <= 7; $i++)
                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor

                                                </select>
                                            </div>
                                            @break
                                        @case(8)
                                            <div class="flex justify-center">
                                                <select name="select{{$questionId}}" id="select{{$questionId}}"
                                                wire:model="answersSelected.{{8}}"
                                                class="bg-gray-50 border justify-center w-1/3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                >
                                                    <option value="">Selecciona </option>
                                                        @for ($i = 1; $i <= 10; $i++)
                                                            @if ($i==1)
                                                                <option value="{{ $i }}">{{ $i }} Litro</option>
                                                            @else
                                                                <option value="{{ $i }}">{{ $i }} Litros</option>
                                                            @endif
                                                        @endfor

                                                </select>
                                            </div>
                                            @break
                                        @case(9)
                                            <div class="flex justify-center">
                                                <select name="select{{$questionId}}" id="select{{$questionId}}"
                                                wire:model="answersSelected.{{9}}"
                                                class="bg-gray-50 border justify-center w-1/3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                >
                                                    <option value="">Selecciona</option>
                                                        @for ($i = 3; $i <= 12; $i++)
                                                            <option value="{{ $i }}">{{ $i }} Hrs</option>
                                                        @endfor

                                                </select>
                                            </div>
                                            @break
                                        @case(10)
                                            @if (!isset($answersSelected[4]))
                                                <p class="text-center text-xl text-slate-400 underline">Debes Seleccionar Genero</p>

                                            @elseif ($answersSelected[4]=='1')
                                            <div class="w-1/4 mx-auto">
                                                <div class="relative">
                                                    <img
                                                        src="storage/photos/grasa-hombre.jpeg"
                                                        alt="Porcentajes de grasa corporal"
                                                        class="w-full h-auto"
                                                    >

                                                    <!-- Grid de áreas clickeables -->
                                                    <div class="absolute inset-0 grid grid-cols-3 grid-rows-3">
                                                        <!-- Primera fila -->
                                                        <div wire:click="seleccionarPorcentajeHombre(1)"
                                                             class="cursor-pointer transition-all duration-200  {{ $seleccionadoHombre == 1 ? 'bg-black bg-opacity-70' : 'hover:bg-black hover:bg-opacity-30' }} ">
                                                        </div>
                                                        <div wire:click="seleccionarPorcentajeHombre(2)"
                                                             class="cursor-pointer transition-all duration-200 {{ $seleccionadoHombre == 2 ? 'bg-black bg-opacity-70' : 'hover:bg-black hover:bg-opacity-30' }}">
                                                        </div>
                                                        <div wire:click="seleccionarPorcentajeHombre(3)"
                                                             class="cursor-pointer transition-all duration-200 {{ $seleccionadoHombre == 3 ? 'bg-black bg-opacity-70' : 'hover:bg-black hover:bg-opacity-30' }}">
                                                        </div>

                                                        <!-- Segunda fila -->
                                                        <div wire:click="seleccionarPorcentajeHombre(4)"
                                                             class="cursor-pointer transition-all duration-200 {{ $seleccionadoHombre == 4 ? 'bg-black bg-opacity-70' : 'hover:bg-black hover:bg-opacity-30' }}">
                                                        </div>
                                                        <div wire:click="seleccionarPorcentajeHombre(5)"
                                                             class="cursor-pointer transition-all duration-200 {{ $seleccionadoHombre == 5 ? 'bg-black bg-opacity-70' : 'hover:bg-black hover:bg-opacity-30' }}">
                                                        </div>
                                                        <div wire:click="seleccionarPorcentajeHombre(6)"
                                                             class="cursor-pointer transition-all duration-200 {{ $seleccionadoHombre == 6 ? 'bg-black bg-opacity-70' : 'hover:bg-black hover:bg-opacity-30' }}">
                                                        </div>

                                                        <!-- Tercera fila -->
                                                        <div wire:click="seleccionarPorcentajeHombre(7)"
                                                             class="cursor-pointer transition-all duration-200 {{ $seleccionadoHombre == 7 ? 'bg-black bg-opacity-70' : 'hover:bg-black hover:bg-opacity-30' }}">
                                                        </div>
                                                        <div wire:click="seleccionarPorcentajeHombre(8)"
                                                             class="cursor-pointer transition-all duration-200 {{ $seleccionadoHombre == 8 ? 'bg-black bg-opacity-70' : 'hover:bg-black hover:bg-opacity-30' }}">
                                                        </div>
                                                        <div wire:click="seleccionarPorcentajeHombre(9)"
                                                             class="cursor-pointer transition-all duration-200 {{ $seleccionadoHombre == 9 ? 'bg-black bg-opacity-70' : 'hover:bg-black hover:bg-opacity-30' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            <div class="w-1/3 mx-auto">
                                                <div class="relative">
                                                    <img
                                                        src="storage/photos/grasa-mujer.jpeg"
                                                        alt="Porcentajes de grasa corporal"
                                                        class="w-full h-auto"
                                                    >

                                                    <!-- Grid de áreas clickeables -->
                                                    <div class="absolute inset-0 grid grid-cols-3 grid-rows-3">
                                                        <!-- Primera fila -->
                                                        <div wire:click="seleccionarPorcentajeMujer(1)"
                                                             class="cursor-pointer transition-all duration-200  {{ $seleccionadoMujer == 1 ? 'bg-black bg-opacity-70' : 'hover:bg-black hover:bg-opacity-30' }} ">
                                                        </div>
                                                        <div wire:click="seleccionarPorcentajeMujer(2)"
                                                             class="cursor-pointer transition-all duration-200 {{ $seleccionadoMujer == 2 ? 'bg-black bg-opacity-70' : 'hover:bg-black hover:bg-opacity-30' }}">
                                                        </div>
                                                        <div wire:click="seleccionarPorcentajeMujer(3)"
                                                             class="cursor-pointer transition-all duration-200 {{ $seleccionadoMujer == 3 ? 'bg-black bg-opacity-70' : 'hover:bg-black hover:bg-opacity-30' }}">
                                                        </div>

                                                        <!-- Segunda fila -->
                                                        <div wire:click="seleccionarPorcentajeMujer(4)"
                                                             class="cursor-pointer transition-all duration-200 {{ $seleccionadoMujer == 4 ? 'bg-black bg-opacity-70' : 'hover:bg-black hover:bg-opacity-30' }}">
                                                        </div>
                                                        <div wire:click="seleccionarPorcentajeMujer(5)"
                                                             class="cursor-pointer transition-all duration-200 {{ $seleccionadoMujer == 5 ? 'bg-black bg-opacity-70' : 'hover:bg-black hover:bg-opacity-30' }}">
                                                        </div>
                                                        <div wire:click="seleccionarPorcentajeMujer(6)"
                                                             class="cursor-pointer transition-all duration-200 {{ $seleccionadoMujer == 6 ? 'bg-black bg-opacity-70' : 'hover:bg-black hover:bg-opacity-30' }}">
                                                        </div>

                                                        <!-- Tercera fila -->
                                                        <div wire:click="seleccionarPorcentajeMujer(7)"
                                                             class="cursor-pointer transition-all duration-200 {{ $seleccionadoMujer == 7 ? 'bg-black bg-opacity-70' : 'hover:bg-black hover:bg-opacity-30' }}">
                                                        </div>
                                                        <div wire:click="seleccionarPorcentajeMujer(8)"
                                                             class="cursor-pointer transition-all duration-200 {{ $seleccionadoMujer == 8 ? 'bg-black bg-opacity-70' : 'hover:bg-black hover:bg-opacity-30' }}">
                                                        </div>
                                                        <div wire:click="seleccionarPorcentajeMujer(9)"
                                                             class="cursor-pointer transition-all duration-200 {{ $seleccionadoMujer == 9 ? 'bg-black bg-opacity-70' : 'hover:bg-black hover:bg-opacity-30' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @break
                                        @case(11)
                                            @if (!isset($answersSelected[4]))
                                                <p class="text-center text-xl text-slate-400 underline">Debes Seleccionar Tipo de Cuerpo</p>
                                            @elseif($answersSelected[4]=='1')
                                                <div class="w-2/5 mx-auto">
                                                    <div class="relative">
                                                        <img src="{{ asset('storage/photos/tipo-cuerpo-hombre.jpg') }}" alt="Tipo de Cuerpo Hombre" class="w-full h-auto">
                                                        <div class="absolute inset-0 grid grid-cols-3 grid-rows-1">
                                                            <div class="cursor-pointer transition-all duration-200 {{$seleccionadoTipoCuerpo==1 ?'bg-black bg-opacity-70':' hover:bg-opacity-30 hover:bg-black'}}"
                                                                wire:click="seleccionarTipoCuerpo(1)"
                                                            ></div>
                                                            <div class="cursor-pointer transition-all duration-200 {{$seleccionadoTipoCuerpo==2?'bg-black bg-opacity-70':'hover:bg-black hover:bg-opacity-30'}}"
                                                                wire:click="seleccionarTipoCuerpo(2)"
                                                            ></div>
                                                            <div class="cursor-pointer transition-all duration-200 {{$seleccionadoTipoCuerpo==3?'bg-black bg-opacity-70':'hover:bg-black hover:bg-opacity-30'}}"
                                                                wire:click="seleccionarTipoCuerpo(3)"
                                                            ></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="w-2/5 mx-auto">
                                                    <div class="relative">
                                                        <img src="{{ asset('storage/photos/tipo-cuerpo-mujer.jpg') }}" alt="Tipo de Cuerpo Mujer" class="w-full h-auto">
                                                        <div class="absolute inset-0 grid grid-cols-3 grid-rows-1">
                                                            <div class="cursor-pointer transition-all duration-200 {{ $seleccionadoTipoCuerpo == 1 ? 'bg-black bg-opacity-70' : 'hover:bg-black hover:bg-opacity-30' }}"
                                                            wire:click="seleccionarTipoCuerpo(1)"
                                                            >

                                                            </div>
                                                            <div class="cursor-pointer transition-all duration-200 {{ $seleccionadoTipoCuerpo == 2 ? 'bg-black bg-opacity-70' : 'hover:bg-black hover:bg-opacity-30' }}"
                                                            wire:click="seleccionarTipoCuerpo(2)"
                                                            >

                                                            </div>
                                                            <div class="cursor-pointer transition-all duration-200 {{ $seleccionadoTipoCuerpo == 3 ? 'bg-black bg-opacity-70' : 'hover:bg-black hover:bg-opacity-30' }}"
                                                            wire:click="seleccionarTipoCuerpo(3)"
                                                            >

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @break
                                            @case(12)
                                            <div class="flex gap-4 w-full">
                                                @foreach ($options[$questionId] as $optionId => $optionName)
                                                    <div class="relative flex-1">
                                                        <input
                                                            id="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                            name="radioAnswer_{{ $questionId }}"
                                                            type="radio"
                                                            value="{{ $optionId }}"
                                                            wire:model="answersSelected.{{ 12 }}"
                                                            class="peer sr-only"
                                                        >
                                                        <label
                                                            for="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                            class="flex items-center justify-center w-full px-2 py-2 gap-2 border-2 border-gray-200 rounded-lg dark:border-gray-700 cursor-pointer
                                                                   peer-checked:border-blue-500 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/20
                                                                   hover:bg-gray-50 dark:hover:bg-gray-800 transition-all duration-200 min-h-[80px]
                                                                   peer-checked:ring-2 peer-checked:ring-blue-500 peer-checked:ring-opacity-50"
                                                        >
                                                            <span class="text-sm text-center w-full p-2 font-medium text-gray-900 dark:text-gray-300">
                                                                {{ $optionName }}
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @break
                                            @case(13)
                                            <div class="flex gap-4 w-full">
                                                @foreach ($options[$questionId] as $optionId => $optionName)
                                                    <div class="relative flex-1">
                                                        <input
                                                            id="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                            name="radioAnswer_{{ $questionId }}"
                                                            type="radio"
                                                            value="{{ $optionId }}"
                                                            wire:model="answersSelected.{{ 13 }}"
                                                            class="peer sr-only"
                                                        >
                                                        <label
                                                            for="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                            class="flex items-center justify-center w-full px-2 py-2 gap-2 border-2 border-gray-200 rounded-lg dark:border-gray-700 cursor-pointer
                                                                   peer-checked:border-blue-500 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/20
                                                                   hover:bg-gray-50 dark:hover:bg-gray-800 transition-all duration-200 min-h-[80px]
                                                                   peer-checked:ring-2 peer-checked:ring-blue-500 peer-checked:ring-opacity-50"
                                                        >
                                                            <span class="text-sm text-center w-full p-2 font-medium text-gray-900 dark:text-gray-300">
                                                                {{ $optionName }}
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @break
                                            @case(14)
                                            <div class="w-full px-4">
                                                <!-- Grid compacto con versiones cortas del texto -->
                                                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3 w-full max-w-5xl mx-auto">
                                                    @foreach ($options[$questionId] as $optionId => $optionName)
                                                        @php
                                                            // Crear versiones cortas para mejor legibilidad
                                                            $shortName = '';
                                                            $subtitle = '';

                                                            if (str_contains($optionName, 'Sedentario')) {
                                                                $shortName = 'Sedentario';
                                                                $subtitle = '< 5,000 pasos';
                                                            } elseif (str_contains($optionName, 'ligera')) {
                                                                $shortName = 'Ligera';
                                                                $subtitle = '5,000-7,500 pasos';
                                                            } elseif (str_contains($optionName, 'moderada')) {
                                                                $shortName = 'Moderada';
                                                                $subtitle = '7,500-10,000 pasos';
                                                            } elseif (str_contains($optionName, 'intensa') && !str_contains($optionName, 'muy')) {
                                                                $shortName = 'Intensa';
                                                                $subtitle = '10,000-15,000 pasos';
                                                            } elseif (str_contains($optionName, 'muy intensa')) {
                                                                $shortName = 'Muy Intensa';
                                                                $subtitle = '> 15,000 pasos';
                                                            } else {
                                                                $shortName = $optionName;
                                                            }
                                                        @endphp

                                                        <div class="relative">
                                                            <input
                                                                id="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                                name="radioAnswer_{{ $questionId }}"
                                                                type="radio"
                                                                value="{{ $optionId }}"
                                                                wire:model="answersSelected.{{ 14 }}"
                                                                class="peer sr-only"
                                                            >
                                                            <label
                                                                for="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                                class="flex flex-col items-center justify-center px-3 py-4 gap-1 border-2 border-gray-200 rounded-lg dark:border-gray-700 cursor-pointer
                                                                       peer-checked:border-blue-500 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/20
                                                                       hover:bg-gray-50 dark:hover:bg-gray-800 transition-all duration-200 min-h-[100px]
                                                                       peer-checked:ring-2 peer-checked:ring-blue-500 peer-checked:ring-opacity-50"
                                                            >
                                                                <div class="text-sm font-semibold text-gray-900 dark:text-gray-300 text-center">
                                                                    {{ $shortName }}
                                                                </div>
                                                                @if($subtitle)
                                                                    <div class="text-xs text-gray-500 dark:text-gray-400 text-center">
                                                                        {{ $subtitle }}
                                                                    </div>
                                                                @endif
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <!-- Información adicional -->
                                                <div class="mt-4 text-center">
                                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                                        💡 Incluye caminata, ejercicio y actividades diarias
                                                    </p>
                                                </div>
                                            </div>
                                            @break
                                            @case(15)
                                            <div class="flex gap-4 w-full">
                                                @foreach ($options[$questionId] as $optionId => $optionName)
                                                    <div class="relative flex-1">
                                                        <input
                                                            id="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                            name="radioAnswer_{{ $questionId }}"
                                                            type="radio"
                                                            value="{{ $optionId }}"
                                                            wire:model="answersSelected.{{ 15 }}"
                                                            class="peer sr-only"
                                                        >
                                                        <label
                                                            for="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                            class="flex items-center justify-center w-full px-2 py-2 gap-2 border-2 border-gray-200 rounded-lg dark:border-gray-700 cursor-pointer
                                                                   peer-checked:border-blue-500 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/20
                                                                   hover:bg-gray-50 dark:hover:bg-gray-800 transition-all duration-200 min-h-[80px]
                                                                   peer-checked:ring-2 peer-checked:ring-blue-500 peer-checked:ring-opacity-50"
                                                        >
                                                            <span class="text-sm text-center w-full p-2 font-medium text-gray-900 dark:text-gray-300">
                                                                {{ $optionName }}
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @break
                                        @case(16)
                                            <div class="flex gap-4 justify-center">
                                                <select name="selectYears{{$questionId}}" id="selectYears{{$questionId}}"
                                                    wire:model="answersSelectedYears.{{16}}"
                                                    class="bg-gray-50 border justify-center w-1/6 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                                    focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                    dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required
                                                >
                                                    <option value="">Años</option>
                                                    @for ($i = 0; $i <= 20; $i++)
                                                        <option value="{{ $i }}">{{ $i }} {{ $i == 1 ? 'Año' : 'Años' }}</option>
                                                    @endfor
                                                </select>

                                                <select name="selectMonths{{$questionId}}" id="selectMonths{{$questionId}}"
                                                    wire:model="answersSelectedMonths.{{16}}"
                                                    class="bg-gray-50 border justify-center w-1/6 border-gray-300 text-gray-900 text-sm rounded-lg
                                                    focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                                    dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required
                                                >
                                                    <option value="">Meses</option>
                                                    @for ($i = 0; $i <= 12; $i++)
                                                        <option value="{{ $i }}">{{ $i }} {{ $i == 1 ? 'Mes' : 'Meses' }}</option>
                                                    @endfor
                                                </select>
                                            </div>

                                            @break
                                            @case(17)
                                            <div class="flex flex-col gap-4 w-full justify-center"
                                                x-data="{ openInput: false }">
                                                <div class="flex gap-4 justify-center">
                                                    @foreach ($options[$questionId] as $optionId => $optionName)
                                                        <div class="relative flex-1 max-w-xs">
                                                            <input
                                                                id="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                                name="radioAnswer_{{ $questionId }}"
                                                                type="radio"
                                                                value="{{ $optionId }}"
                                                                wire:model="answersSelected.{{ 17 }}"
                                                                x-on:click="openInput = {{$optionId == 21 ? 'true' : 'false'}}"
                                                                class="peer sr-only"
                                                            >
                                                            <label
                                                                for="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                                class="flex items-center justify-center px-2 py-2 gap-2 border-2 border-gray-200 rounded-lg dark:border-gray-700 cursor-pointer
                                                                       peer-checked:border-blue-500 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/20
                                                                       hover:bg-gray-50 dark:hover:bg-gray-800 transition-all duration-200 min-h-[80px]
                                                                       peer-checked:ring-2 peer-checked:ring-blue-500 peer-checked:ring-opacity-50"
                                                            >
                                                                <span class="text-sm text-center w-full p-2 font-medium text-gray-900 dark:text-gray-300">
                                                                    {{ $optionName }}
                                                                </span>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="w-full">
                                                    <input
                                                        type="text"
                                                        class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300
                                                               focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                                                        x-show="openInput"
                                                        name="answersSelected.17"
                                                        id="answer_17"
                                                        wire:model="answersSelected.18"
                                                        placeholder="Escribe tu Preferencia de dieta"
                                                        x-cloak
                                                    >
                                                </div>
                                            </div>
                                            @break
                                    @default
                                @endswitch
                            @endforeach

                            @else
                                <p>No hay preguntas disponibles.</p>
                            @endif
                        </form>
                        <div class="mt-6 flex justify-between items-center">
                            @if ($currentPage > 1)
                                <button
                                    wire:click="previousPage"
                                    class="px-4 py-2 bg-gray-300 text-gray-900 rounded-lg hover:bg-slate-950 hover:text-gray-200">
                                    Anterior
                                </button>
                            @else
                                <div></div>
                            @endif

                            <p class="text-slate-400">Página {{ $currentPage }}</p>

                            @if (count($questions) > $currentPage * $perPage)
                                <button
                                    wire:click="nextPage"
                                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-slate-950 hover:text-blue-400"
                                    @click="setTimeout(() => { if ($wire.pageValidationError) { $wire.set('pageValidationError', '') } }, 3000)"
                                    >
                                    Siguiente
                                </button>
                            @else
                                <div></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class=" min-h-[50vh] pt-1">
                <div class="flex space-x-4">
                    <div class="inline-flex ml-3 p-1 gap-3 cursor-pointer bg-gray-900 text-lime-500 hover:bg-[#010c02] rounded-md" @click="sortOrderAlimentacion = !sortOrderAlimentacion" style="user-select: none">
                        <p class="text-xl font-black">Plan de Alimentacion</p>
                        <button >
                            <div x-show="sortOrderAlimentacion">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>

                            <!-- Icono 2: Se muestra cuando sortOrderAlimentacion es true -->
                            <div x-show="!sortOrderAlimentacion">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="flex items-center h-full">
                    <!-- Botón para crear nuevo plan -->
                    <div x-show="!sortOrderAlimentacion" class="flex-none justify-center text-center mr-8 mt-10">
                        <button type="button"
                            wire:click="mostrarModalConfirmacion"
                            class="inline-flex items-center ml-2 px-6 gap-2 py-2 border border-transparent text-sm leading-5 font-medium rounded-md bg-gray-900 text-indigo-400 hover:bg-slate-950">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <p class="">Crear Nuevo Plan</p>
                        </button>

                    </div>

                    <!-- Contenedor de los meal_plans -->
                    <div x-show="!sortOrderAlimentacion"
                         class="flex {{ $meal_plans->isEmpty() ? '' : 'overflow-x-scroll scroll-auto' }} gap-4 mx-4 scroll-container
                                [&::-webkit-scrollbar]:h-2 /* Altura del scrollbar horizontal */
                                [&::-webkit-scrollbar]:w-2 /* Ancho del scrollbar vertical */
                                [&::-webkit-scrollbar-track]:rounded-full
                                [&::-webkit-scrollbar-track]:bg-gray-100
                                [&::-webkit-scrollbar-thumb]:rounded-full
                                [&::-webkit-scrollbar-thumb]:bg-gray-300
                                dark:[&::-webkit-scrollbar-track]:bg-gray-700
                                dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500"
                         style="user-select: none;">

                        <!-- Mensaje si no hay planes de alimentación -->
                        @if ($meal_plans->isEmpty())
                            <div class="flex mt-[12%] underline text-xl">
                                <p class=" border border-black p-3 bg-gray-300 text-black rounded-md">No hay plan de Alimentación disponibles.</p>
                            </div>
                        @else
                            <!-- Contenedor de los meal_plans -->
                            <div class="flex gap-4 my-3 ml-6 " style="min-width: max-content;">
                                @foreach ($meal_plans as $key => $meal_plan)
                                    <div class="flex-none w-64"> <!-- Ancho fijo para cada columna -->
                                        <div class="border-2 border-lime-950  bg-gray-900 text-lime-500 hover:bg-slate-950 py-10 px-4 rounded-md flex flex-col gap-0">
                                            <div class="text-md font-bold -mt-10 -ml-2 text-white flex justify-between">
                                                <p>{{ $meal_plan->id }}</p>
                                                <button type="button" wire:click="deleteMealPlan({{$meal_plan->id}})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mt-2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                      </svg>
                                                </button>
                                            </div>
                                            <div class="text-center mt-10 ">{{ $meal_plan->name }}</div>
                                            {!! isset($meal_plans[$key]) && $meal_plans[$key]->is_active ? '<p class="text-center my-2 font-black text-indigo-400 underline">Activo</p>' : '<p class="text-center my-2 text-gray-400 font-black">Inactivo</p>' !!}
                                            <button
                                                class="p-2 mt-4 w-1/3 mx-auto rounded-md border border-black hover:bg-slate-800 mb-2"
                                                @click="window.location.href = '{{ route('plan-alimentacion', $meal_plan->id) }}'">
                                                Ver
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

            </div>

            <div class=" min-h-[50vh] mt-3">
                <div class="flex space-x-4">
                    <div class="inline-flex ml-3 p-1 gap-3 cursor-pointer border border-cyan-900 bg-gray-950 hover:bg-black text-cyan-600 rounded-md " @click="sortOrderEntrenamiento = !sortOrderEntrenamiento" style="user-select: none">
                        <p class="text-xl font-black">Plan de Entrenamiento</p>
                        <button >
                            <div x-show="sortOrderEntrenamiento">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>

                            <div x-show="!sortOrderEntrenamiento">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>
                <div x-show="!sortOrderEntrenamiento"
                    class="flex items-center h-full ">
                    <div class="flex {{$workout_plans->isEmpty()?'':'overflow-x-scroll scroll-auto'}} gap-4 mx-4 scroll-container
                        [&::-webkit-scrollbar]:h-2 /* Altura del scrollbar horizontal */
                        [&::-webkit-scrollbar]:w-2 /* Ancho del scrollbar vertical */
                        [&::-webkit-scrollbar-track]:rounded-full
                        [&::-webkit-scrollbar-track]:bg-gray-100
                        [&::-webkit-scrollbar-thumb]:rounded-full
                        [&::-webkit-scrollbar-thumb]:bg-gray-300
                        dark:[&::-webkit-scrollbar-track]:bg-gray-700
                        dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500"
                        style="user-select: none;">
                        <!-- Los elementos "hola" se acomodarán automáticamente en columnas -->
                        @if ($workout_plans->isEmpty())

                        <div class="col-auto flex items-center  mt-14 underline text-xl">
                            <p class="border border-black p-3 bg-gray-300 text-black rounded-md">No hay plan de Alimentacion disponibles.</p>
                        </div>

                        @else

                            <div  class="flex gap-4 my-3 " style="min-width: max-content;">
                                @foreach ($workout_plans as $key => $workout_plan)
                                    <!-- Cada meal_plan -->
                                    <div class="flex-none w-64"> <!-- Ancho fijo para cada columna -->
                                        <div class="border  border-cyan-950 bg-gray-900 hover:bg-slate-950 text-cyan-600 py-10 px-4 rounded-md flex flex-col gap-0">
                                            <div class="text-md font-bold -mt-10 -ml-2 text-white">{{ $workout_plan->id }}</div>
                                            <div class="text-center font-black mt-10">{{ $workout_plan->name }}</div>
                                            {!! isset($meal_plans[$key]) && $meal_plans[$key]->is_active ? '<p class="text-center my-2 font-black text-blue-500 underline">Activo</p>' : '<p class="text-center my-2 text-gray-400 font-black">Inactivo</p>' !!}
                                            <button
                                                class="p-2 mt-4 w-1/3 mx-auto rounded-md border border-black mb-2 hover:bg-slate-800"
                                                @click="window.location.href = '{{ route('plan-entrenamiento', $workout_plan->id) }}'">
                                                Ver
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>



                        @endif
                    </div>
                </div>
            </div>

            </div>


        </div>
    </x-app-layout>
@endauth

</div>

<script>
   document.querySelectorAll('.scroll-container').forEach(container => {
    let isDragging = false;
    let startX, scrollLeft;

    container.addEventListener('mousedown', (e) => {
        isDragging = true;
        startX = e.pageX - container.offsetLeft;
        scrollLeft = container.scrollLeft;
        container.style.cursor = 'grabbing';
    });

    container.addEventListener('mouseleave', () => {
        isDragging = false;
        container.style.cursor = 'grab';
    });

    container.addEventListener('mouseup', () => {
        isDragging = false;
        container.style.cursor = 'grab';
    });

    container.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        e.preventDefault();
        const x = e.pageX - container.offsetLeft;
        const walk = (x - startX) * 2;
        container.scrollLeft = scrollLeft - walk;
    });
});
</script>
