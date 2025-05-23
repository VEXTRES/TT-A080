<div>

    <x-app-layout>
        <x-slot name="header">
            <p class="text-xl font-black  text-cyan-600">
                # {{$idPlan}} Seguimiento ({{$title[$idPlan]}})
            </p>
        </x-slot>
        <div class="w-full bg-[#232931] min-h-screen">


            <div class="container mx-auto py-8 overflow-x-auto">
                <div class="flex flex-wrap gap-4">
                    @foreach ($trackings as $key => $tracking)
                        <div class="bg-gray-900 text-white shadow-md rounded-lg w-full sm:w-1/2 md:w-1/3 lg:w-1/4 flex-shrink-0 min-w-0 overflow-hidden">
                            <div class="p-4 flex flex-col">
                                <div class="inline-flex items-center justify-between">
                                    <h3 class="text-lg font-bold text-lime-500">Nota {{$key+1}}</h3>
                                    {{-- <button type="button" wire:click="deleteNote({{$key}})">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mt-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button> --}}
                                </div>
                                <p class="text-gray-500">Fecha {{$tracking->created_at}}</p>
                                <p class="my-3">{{$tracking->note}}</p>
                                <img src="{{ asset($tracking->photo) }}" alt="Imagen" class="max-w-full h-auto rounded-lg">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


        </div>
    </x-app-layout>

</div>
