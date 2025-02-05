<div>

    <x-app-layout>
        <x-slot name="header">
            <p class="text-xl font-black  text-cyan-600">
                # {{$idPlan}} Seguimiento ({{$title[$idPlan]}})
            </p>
        </x-slot>
        <div class="w-full bg-[#232931] min-h-screen">


            <div class="container mx-auto py-8 overflow-x-auto ">
                <div class="flex gap-4 ">
                    @foreach ($trackings as $key => $tracking)
                        <div class=" bg-gray-900 text-white shadow-md rounded-lg w-1/4 flex-shrink-0 ">
                            <div class="p-4 flex flex-col">
                                <h3 class="text-lg font-bold text-lime-500">Nota {{$key+1}}</h3>
                                <p class="text-gray-500">Fecha {{$tracking->created_at}}</p>
                                <p class="my-3">{{$tracking->note}}</p>
                                <img src="{{ asset($tracking->photo) }}" alt="Imagen">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </x-app-layout>

</div>
