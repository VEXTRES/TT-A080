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
                                <h3 class="text-lg font-bold text-lime-500">Nota {{$key+1}}</h3>
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
