<div x-data="{
    sortOrderAlimentacion: @entangle('sortOrderAlimentacion'),
    sortOrderEntrenamiento: @entangle('sortOrderEntrenamiento'),
    showAlert: true,
}">
    @auth
    <x-app-layout>
        <div class=" w-full bg-slate-400 ">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Plan de Alimentacion') }}
                </h2>
            </x-slot>

            <div class="   ">
                <div class="absolute m-auto mt-6 w-3/4 h-screen inset-0" @click.outside="$wire.call('MostrarModal')" style="display: {{ $showModal === true ? 'block' : 'none' }} ;">{{-- {{ $showModal === true ? 'block' : 'none' }} --}}
                    <div class="bg-slate-800 p-8 rounded-lg shadow-lg"

                    >
                        <!-- Modal Content -->
                        <div class="flex flex-col "
                        >
                            <div class="flex justify-between">
                                <h2 class="text-xl font-semibold mx-auto text-white">Sondeo preguntas</h2>
                                <button wire:click="MostrarModal" class="text-white p-3 rounded-md bg-slate-600 hover:text-gray-300">&times;</button>
                            </div>
                            <div class="mx-auto ">
                                @if(session('failed'))
                                    <div
                                        class="alert alert-danger"
                                        x-show="showAlert"
                                    >
                                        <p class="text-red-500 border border-red-500 p-2">{{ session('failed') }}</p>
                                    </div>
                                @endif
                                @if(session('success'))
                                    <div
                                        class="alert alert-success"
                                        x-show="showAlert"
                                    >
                                        <p class="text-green-500 border border-green-500 p-2">{{ session('success') }}</p>
                                    </div>
                                @endif
                            </div>

                        </div>
                        <form wire:submit="CrearPlan" x-on:submit="showAlert = true, setTimeout(()=>showAlert=false, 2000)">
                            <div class="flex justify-end mt-3">
                                <button type="submit" class=" px-4 py-2 bg-blue-500 text-black font-black rounded-lg">Crear Plan</button>
                            </div>
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
                                                    @for ($i = 18; $i <= 50; $i++)
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
                                                    <div class="flex items-center justify-center w-full px-4 py-3 gap-2 border border-gray-200 rounded dark:border-gray-700">
                                                        <input
                                                            id="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                            name="radioAnswer_{{ $questionId }}"
                                                            type="radio"
                                                            value="{{ $optionId }}"
                                                            wire:model="answersSelected.{{ 4 }}"
                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                        >
                                                        <label
                                                            for="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                            class="text-sm text-center w-full font-medium text-gray-900 dark:text-gray-300"
                                                        >
                                                            {{ $optionName }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>

                                            @break
                                        @case(5)
                                            <div class="flex gap-4 w-full ">
                                                @foreach ($options[$questionId] as $optionId => $optionName)
                                                    <div class="flex items-center justify-center w-full px-2 py-2 gap-2 border border-gray-200 rounded dark:border-gray-700">
                                                        <input
                                                            id="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                            name="radioAnswer_{{ $questionId }}"
                                                            type="radio"
                                                            value="{{ $optionId }}"
                                                            wire:model="answersSelected.{{ 5 }}"
                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                        >
                                                        <label
                                                            for="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                            class="text-sm text-center w-full p-2 font-medium text-gray-900 dark:text-gray-300"
                                                        >
                                                            {{ $optionName }}
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
                                                        @for ($i = 1; $i <= 15; $i++)
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
                                                        @for ($i = 3; $i <= 11; $i++)
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
                                            <div class="flex gap-4 w-full ">
                                                @foreach ($options[$questionId] as $optionId => $optionName)
                                                    <div class="flex items-center justify-center w-full px-2 py-2 gap-2 border border-gray-200 rounded dark:border-gray-700">
                                                        <input
                                                            id="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                            name="radioAnswer_{{ $questionId }}"
                                                            type="radio"
                                                            value="{{ $optionId }}"
                                                            wire:model="answersSelected.{{ 12 }}"
                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                        >
                                                        <label
                                                            for="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                            class="text-sm text-center w-full p-2 font-medium text-gray-900 dark:text-gray-300"
                                                        >
                                                            {{ $optionName }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @break
                                        @case(13)
                                            <div class="flex gap-4 w-full ">
                                                @foreach ($options[$questionId] as $optionId => $optionName)
                                                    <div class="flex items-center justify-center w-full px-2 py-2 gap-2 border border-gray-200 rounded dark:border-gray-700">
                                                        <input
                                                            id="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                            name="radioAnswer_{{ $questionId }}"
                                                            type="radio"
                                                            value="{{ $optionId }}"
                                                            wire:model="answersSelected.{{ 13 }}"
                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                        >
                                                        <label
                                                            for="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                            class="text-sm text-center w-full p-2 font-medium text-gray-900 dark:text-gray-300"
                                                        >
                                                            {{ $optionName }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @break
                                        @case(14)
                                            <div class="flex gap-4 w-full justify-center ">
                                                @foreach ($options[$questionId] as $optionId => $optionName)
                                                    <div class="flex items-center justify-center w-1/3 px-2 py-2 gap-2 border border-gray-200 rounded dark:border-gray-700">
                                                        <input
                                                            id="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                            name="radioAnswer_{{ $questionId }}"
                                                            type="radio"
                                                            value="{{ $optionId }}"
                                                            wire:model="answersSelected.{{ 14 }}"
                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                        >
                                                        <label
                                                            for="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                            class="text-sm text-center w-full p-2 font-medium text-gray-900 dark:text-gray-300"
                                                        >
                                                            {{ $optionName }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @break
                                        @case(15)
                                            <div class="flex gap-4 w-full ">
                                                @foreach ($options[$questionId] as $optionId => $optionName)
                                                    <div class="flex items-center justify-center w-full px-2 py-2 gap-2 border border-gray-200 rounded dark:border-gray-700">
                                                        <input
                                                            id="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                            name="radioAnswer_{{ $questionId }}"
                                                            type="radio"
                                                            value="{{ $optionId }}"
                                                            wire:model="answersSelected.{{ 15 }}"
                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                        >
                                                        <label
                                                            for="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                            class="text-sm text-center w-full p-2 font-medium text-gray-900 dark:text-gray-300"
                                                        >
                                                            {{ $optionName }}
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
                                                        <div class="flex w-1/3 items-center justify-center px-2 py-2 gap-2 border border-gray-200 rounded dark:border-gray-700">
                                                            <input
                                                                id="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                                name="radioAnswer_{{ $questionId }}"
                                                                type="radio"
                                                                value="{{ $optionId }}"
                                                                wire:model="answersSelected.{{ 17 }}"
                                                                x-on:click="openInput = {{$optionId == 21 ? 'true' : 'false'}}"
                                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                            >
                                                            <label
                                                                for="radioAnswer_{{ $questionId }}_{{ $optionId }}"
                                                                class="text-sm text-center w-full p-2 font-medium text-gray-900 dark:text-gray-300"
                                                            >
                                                                {{ $optionName }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                    </div>
                                                    <div class="w-full">
                                                        <input
                                                            type="text"
                                                            class="w-full px-4 py-2 border border-gray-300 rounded dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:ring focus:ring-blue-500"
                                                            x-show="openInput"
                                                            name="answersSelected.17"
                                                            id="answer_17"
                                                            placeholder=""
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
                            <button
                                wire:click="previousPage"
                                class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg {{ $currentPage == 1 ? 'opacity-50 cursor-not-allowed' : '' }}"
                                {{ $currentPage == 1 ? 'disabled' : '' }}>
                                <p class="text-black">Anterior</p>
                            </button>
                            <p class="text-slate-400">Página {{ $currentPage }}</p>
                            <button
                                wire:click="nextPage"
                                class="px-4 py-2 bg-blue-500 text-white rounded-lg {{ (count($questions) <= $currentPage * $perPage) ? 'opacity-50 cursor-not-allowed' : '' }}"
                                {{ (count($questions) <= $currentPage * $perPage) ? 'disabled' : '' }}>
                                Siguiente
                            </button>
                        </div>
                    </div>
                </div>
            </div>


                <div class=" min-h-[50vh] bg-slate-600">
                    <div class="flex space-x-4">
                        <p class="text-xl font-black">Plan de Alimentacion</p>
                        <button wire:click="setOrderAlimentacion">
                            @if ($sortOrderAlimentacion)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                </svg>
                            @endif
                        </button>
                    </div>
                    <div x-show="sortOrderAlimentacion == false"
                    class="flex items-center h-full">
                        <div class="flex-none justify-center text-center mr-8">
                            <button class="rounded-md ml-2 bg-white px-4 py-2 text-sm text-gray-700" wire:click="MostrarModal">
                                Crear Nuevo Plan
                            </button>

                        </div>
                        <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            <!-- Los elementos "hola" se acomodarán automáticamente en columnas -->
                            @if ($meal_plans->isEmpty())

                            <div class="col-auto flex items-center ml-4 mt-4 underline text-xl">
                                <p >No hay plan de Alimentacion disponibles.</p>
                            </div>

                            @else
                                        @foreach ($meal_plans as $meal_plan)
                                            <div class="col-auto flex items-center ml-4 mt-4 mb-4">
                                                <div class="border border-black py-20 px-4 rounded-md flex flex-col gap-0">
                                                    <div class="text-md font-bold  -mt-14 -ml-2">{{ $meal_plan->id }}</div>
                                                    <div class="text-center mt-10">{{ $meal_plan->name }}</div>
                                                    <button
                                                        class="p-2 mt-4 w-1/3 mx-auto rounded-md border border-black mb-2"
                                                        @click="window.location.href = '{{ route('plan-alimentacion', $meal_plan->id) }}'">
                                                        Ver
                                                    </button>

                                                </div>
                                            </div>
                                        @endforeach
                            @endif
                        </div>
                    </div>

                </div>

                <div class=" min-h-[50vh] bg-slate-300">
                    <div class="flex space-x-4">
                        <p class="text-xl font-black">Plan de Entrenamiento</p>
                        <button wire:click="setOrderEntrenamiento">
                            @if ($sortOrderEntrenamiento == true)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                </svg>
                            @endif

                        </button>
                    </div>
                    <div x-show="sortOrderEntrenamiento == false"
                        class="flex items-center h-full">
                    <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        <!-- Los elementos "hola" se acomodarán automáticamente en columnas -->
                        @if ($workout_plans->isEmpty())

                        <div class="col-auto flex items-center ml-4 mt-4 underline text-xl">
                            <p >No hay plan de Alimentacion disponibles.</p>
                        </div>

                        @else
                            @foreach ($workout_plans as $workout_plan)
                            <div class="col-auto flex items-center ml-4 mt-4 mb-4">
                                <div class="border border-black py-20 px-4 rounded-md flex flex-col">
                                    <div class="text-md font-bold -mt-14 -ml-2">{{ $workout_plan->id }}</div>
                                    <div class="text-center mt-1">{{ $workout_plan->name }}</div>
                                    <button
                                        class="mt-4 p-3 w-1/3 mx-auto rounded-md border border-black mb-2"
                                        @click="window.location.href = '{{ route('plan-entrenamiento', $workout_plan->id) }}'">
                                        Ver
                                    </button>
                                </div>
                            </div>
                             @endforeach
                        @endif
                    </div>
                    </div>
                </div>
            </div>


        </div>
    </x-app-layout>
@endauth

</div>
