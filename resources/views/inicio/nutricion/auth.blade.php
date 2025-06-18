@auth
<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Nutrición') }}
        </h2>
    </x-slot>

    <div class="py-6 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Bienvenido a la sección de Nutrición</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Descubre el poder de una alimentación equilibrada para transformar tu salud y bienestar.
                </p>
            </div>

            <!-- Definición de Nutrición -->
            <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                <div class="flex items-center mb-6">
                    <div class="bg-green-500 rounded-full p-3 mr-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"/>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800">¿Qué es la Nutrición?</h2>
                </div>
                <p class="text-gray-700 text-lg leading-relaxed mb-4">
                    La nutrición es el proceso mediante el cual el cuerpo obtiene los nutrientes necesarios para funcionar correctamente. Estos nutrientes se obtienen a través de los alimentos y se dividen en macronutrientes (proteínas, carbohidratos y grasas) y micronutrientes (vitaminas y minerales). Una buena nutrición implica elegir alimentos adecuados, en las cantidades correctas y adaptados a las necesidades individuales de cada persona.
                </p>
                <p class="text-gray-700 text-lg leading-relaxed">
                    Se lleva a cabo mediante un plan alimenticio balanceado, diseñado en función de la edad, sexo, nivel de actividad física, objetivos (como pérdida de peso o ganancia muscular) y posibles condiciones médicas. Esto incluye tanto la selección de alimentos como la frecuencia de las comidas, el control de porciones y la hidratación. La personalización del plan es clave para lograr resultados sostenibles y saludables.
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
                        La nutrición es importante porque tiene un impacto directo en la energía, el funcionamiento del sistema inmunológico, el desarrollo físico y mental, y la prevención de enfermedades crónicas como la diabetes, hipertensión, obesidad y ciertos tipos de cáncer. También influye en el rendimiento físico y cognitivo, siendo esencial para mantener un equilibrio funcional en la vida cotidiana.
                    </p>
                </div>

                <!-- Nutrición hoy -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="bg-orange-500 rounded-full p-3 mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">Nutrición Moderna</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed">
                        Hoy en día, la nutrición ha cobrado una relevancia mucho mayor, no solo desde un enfoque médico, sino también como parte del bienestar general y el estilo de vida. Las nuevas tendencias como la alimentación consciente (mindful eating), las dietas basadas en plantas, la nutrición personalizada mediante análisis genéticos, y el uso de apps para el monitoreo de la dieta han revolucionado cómo la gente se relaciona con la comida.
                    </p>
                </div>
            </div>

            <!-- Enfoque actual -->
            <div class="bg-gradient-to-r from-green-400 to-orange-500 rounded-lg shadow-lg p-8 mb-12 text-black">
                <h3 class="text-2xl font-bold mb-4">Nutrición en la Era Digital</h3>
                <p class="text-lg leading-relaxed mb-4">
                    A nivel psicológico, una alimentación adecuada puede mejorar el estado de ánimo, reducir la ansiedad y elevar la autoestima. Socialmente, la nutrición también se ha convertido en una herramienta de conexión, cultura e identidad, ya que las decisiones alimenticias reflejan valores, creencias y objetivos personales.
                </p>
                <p class="text-lg leading-relaxed">
                    En el contexto digital, compartir recetas o logros nutricionales forma parte del sentido de comunidad y motivación. La nutrición moderna es más <strong>personalizada</strong>, <strong>consciente</strong> y <strong>científicamente respaldada</strong>.
                </p>
            </div>

            <!-- Componentes de la nutrición -->
            <div class="grid md:grid-cols-4 gap-6 mb-12">
                <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                    <div class="bg-blue-500 rounded-full p-4 w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 mb-2">Proteínas</h4>
                    <p class="text-gray-600">Esenciales para la construcción y reparación de tejidos musculares.</p>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                    <div class="bg-yellow-500 rounded-full p-4 w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 mb-2">Carbohidratos</h4>
                    <p class="text-gray-600">Principal fuente de energía para el cuerpo y el cerebro.</p>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                    <div class="bg-green-500 rounded-full p-4 w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 mb-2">Grasas</h4>
                    <p class="text-gray-600">Importantes para la absorción de vitaminas y producción hormonal.</p>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                    <div class="bg-purple-500 rounded-full p-4 w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 mb-2">Micronutrientes</h4>
                    <p class="text-gray-600">Vitaminas y minerales esenciales para el funcionamiento óptimo.</p>
                </div>
            </div>

            <!-- Noticias de Nutrición -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Últimas Noticias de Nutrición</h2>

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
                                            <a href="{{ $item['href'] }}" target="_blank" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"/>
                        </svg>
                        <p class="text-gray-500 text-xl">No se encontraron noticias en este momento.</p>
                        <p class="text-gray-400">Vuelve más tarde para ver las últimas actualizaciones sobre nutrición.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
@endauth
