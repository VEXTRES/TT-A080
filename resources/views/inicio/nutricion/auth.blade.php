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

    <div class="py-6 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Bienvenido a la sección de Fitness</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Transforma tu cuerpo y mente a través del ejercicio físico. Descubre tu potencial y alcanza tus objetivos.
                </p>
            </div>

            <!-- Definición de Fitness -->
            <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                <div class="flex items-center mb-6">
                    <div class="bg-blue-500 rounded-full p-3 mr-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800">¿Qué es el Fitness?</h2>
                </div>
                <p class="text-gray-700 text-lg leading-relaxed mb-4">
                    El fitness es el estado de salud y bienestar físico que se logra a través del ejercicio regular, una nutrición adecuada y suficiente descanso. Implica la capacidad del cuerpo para funcionar eficientemente durante las actividades de la vida diaria, así como tener energía suficiente para disfrutar del tiempo libre y enfrentar emergencias físicas imprevistas.
                </p>
                <p class="text-gray-700 text-lg leading-relaxed">
                    Se desarrolla mediante un programa de entrenamiento estructurado que incluye ejercicios cardiovasculares, entrenamiento de fuerza, flexibilidad y equilibrio. La progresión gradual y la consistencia son fundamentales para obtener resultados duraderos y evitar lesiones. Cada programa debe adaptarse a las capacidades individuales, objetivos específicos y limitaciones físicas de cada persona.
                </p>
            </div>

            <!-- Grid de información -->
            <div class="grid md:grid-cols-2 gap-8 mb-12">
                <!-- Por qué es importante -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="bg-red-500 rounded-full p-3 mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">¿Por qué es importante?</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed">
                        El fitness es crucial para mantener un peso saludable, fortalecer el sistema cardiovascular, aumentar la densidad ósea y mejorar la función muscular. Reduce significativamente el riesgo de enfermedades crónicas, mejora la salud mental al liberar endorfinas, aumenta la autoestima y proporciona mayor energía para las actividades diarias. También contribuye a un mejor sueño y longevidad.
                    </p>
                </div>

                <!-- Fitness hoy -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="bg-purple-500 rounded-full p-3 mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">Fitness Moderno</h3>
                </div>
                <p class="text-gray-700 leading-relaxed">
                    El fitness actual ha evolucionado hacia un enfoque más holístico e inclusivo. Las nuevas tendencias incluyen entrenamientos funcionales, HIIT (entrenamiento de intervalos de alta intensidad), clases virtuales, wearables para monitoreo y apps de entrenamiento personalizado. La tecnología ha democratizado el acceso al fitness, permitiendo entrenar desde casa con instructores de clase mundial.
                </p>
            </div>

            <!-- Enfoque actual -->
            <div class="bg-gradient-to-r from-blue-400 to-purple-500 rounded-lg shadow-lg p-8 mb-12 text-white">
                <h3 class="text-2xl font-bold mb-4">Fitness en la Era Digital</h3>
                <p class="text-lg leading-relaxed mb-4">
                    Hoy en día, el fitness va más allá del aspecto físico. Se ha convertido en una forma de vida que integra bienestar mental, social y emocional. Las redes sociales han creado comunidades de apoyo donde las personas comparten sus progreso, retos y logros, generando motivación mutua.
                </p>
                <p class="text-lg leading-relaxed">
                    El fitness moderno es más <strong>personalizado</strong>, <strong>accesible</strong> y <strong>científicamente respaldado</strong>, adaptándose a diferentes estilos de vida y necesidades individuales.
                </p>
            </div>

            <!-- Componentes del fitness -->
            <div class="grid md:grid-cols-4 gap-6 mb-12">
                <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                    <div class="bg-red-500 rounded-full p-4 w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 mb-2">Cardiovascular</h4>
                    <p class="text-gray-600">Fortalece el corazón y mejora la resistencia con ejercicios aeróbicos.</p>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                    <div class="bg-blue-500 rounded-full p-4 w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 mb-2">Fuerza</h4>
                    <p class="text-gray-600">Desarrolla masa muscular y aumenta la potencia con entrenamiento de resistencia.</p>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                    <div class="bg-green-500 rounded-full p-4 w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 mb-2">Flexibilidad</h4>
                    <p class="text-gray-600">Mejora el rango de movimiento y previene lesiones con estiramientos.</p>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                    <div class="bg-yellow-500 rounded-full p-4 w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 mb-2">Equilibrio</h4>
                    <p class="text-gray-600">Desarrolla estabilidad y coordinación para actividades diarias y deportivas.</p>
                </div>
            </div>

            <!-- Noticias de Fitness -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Últimas Noticias de Fitness</h2>

                @if (isset($news['results']) && !empty($news['results']))
                    <div class="flex items-center justify-center w-full">
                        <div id="carouselExampleControls" class="carousel slide max-w-4xl w-full" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($news['results'] as $index => $item)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <div class="text-center p-6 bg-gray-50 rounded-lg mx-4">
                                            <h4 class="text-2xl font-bold mb-4 text-gray-800">{{ $item['title'] }}</h4>
                                            <p class="text-gray-600 mb-4 text-lg">{{ $item['description'] }}</p>
                                            <img class="d-block w-full rounded-lg mb-4 max-h-96 object-cover" src="{{ $item['image'] }}" alt="Slide {{ $index + 1 }}">
                                            <a href="{{ $item['href'] }}" target="_blank" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                                                Leer más
                                            </a>
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
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        <p class="text-gray-500 text-xl">No se encontraron noticias en este momento.</p>
                        <p class="text-gray-400">Vuelve más tarde para ver las últimas actualizaciones sobre fitness.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
@endauth
