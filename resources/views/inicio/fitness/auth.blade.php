@auth
<x-app-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-white leading-tight">
        {{ __('Fitness') }}
    </h2>
</x-slot>
    <div class=" mt-3 min-h-screen">
        <h1 class="flex justify-center ">Bienvenido a la sección de Fitness</h1>
            @if (isset($news['results']) && !empty($news['results']))
            <div class="flex items-center justify-center w-full  pt-8">
                <div id="carouselExampleControls" class="carousel slide max-w-screen-lg mx-auto w-3/5" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($news['results'] as $index => $item)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <div class="text-center p-4 bg-white shadow-lg rounded-lg">
                                    <h2 class="text-xl font-bold">{{ $item['title'] }}</h2>
                                    <p class="text-gray-600">{{ $item['description'] }}</p>
                                    <img class="d-block w-full rounded-lg" src="{{ $item['image'] }}" alt="Slide {{ $index + 1 }}">
                                    <p class="mt-2">
                                        <a href="{{ $item['href'] }}" target="_blank" class="text-blue-500 underline">Leer más</a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        @else
            <p class="text-center text-red-500 mt-4">No se encontraron noticias.</p>
        @endif

    </div>

</x-app-layout>

@endauth
