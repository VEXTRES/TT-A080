@extends('welcome')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="py-6 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Bienvenido a la sección de Salud</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Tu bienestar integral es nuestra prioridad. Descubre información valiosa sobre salud física, mental y social.
            </p>
        </div>

        <!-- Definición de Salud -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
            <div class="flex items-center mb-6">
                <div class="bg-green-500 rounded-full p-3 mr-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-800">¿Qué es la Salud?</h2>
            </div>
            <p class="text-gray-700 text-lg leading-relaxed mb-4">
                La salud es un estado de completo bienestar físico, mental y social, y no solamente la ausencia de enfermedades, según la definición de la OMS. Es un concepto integral que involucra múltiples dimensiones del ser humano: física, emocional, mental y social. Mantener una buena salud requiere cuidados constantes y hábitos de vida saludables.
            </p>
            <p class="text-gray-700 text-lg leading-relaxed">
                Se promueve a través de acciones preventivas como chequeos médicos regulares, buena alimentación, ejercicio físico, higiene personal, descanso adecuado y gestión del estrés. Además, el entorno social, económico y ambiental también influye significativamente en la salud individual y colectiva. La prevención es clave para evitar enfermedades y mejorar la calidad de vida.
            </p>
        </div>

        <!-- Grid de información -->
        <div class="grid md:grid-cols-2 gap-8 mb-12">
            <!-- Por qué es importante -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-blue-500 rounded-full p-3 mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">¿Por qué es importante?</h3>
                </div>
                <p class="text-gray-700 leading-relaxed">
                    La salud es importante porque es la base para poder desarrollarse plenamente en cualquier aspecto de la vida: laboral, académico, familiar o social. Una buena salud permite mayor longevidad, mejor desempeño en las actividades diarias, y menor dependencia en la etapa adulta mayor. Además, mejora la productividad y reduce los costos en servicios de salud a nivel social.
                </p>
            </div>

            <!-- Salud en la actualidad -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-purple-500 rounded-full p-3 mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">Salud Hoy</h3>
                </div>
                <p class="text-gray-700 leading-relaxed">
                    Hoy, la salud ha adquirido una dimensión mucho más amplia y relevante. La pandemia del COVID-19 resaltó su importancia global y despertó una mayor conciencia sobre los cuidados personales y colectivos. La salud digital, el acceso a la telemedicina, los avances en tecnología médica y la salud mental han cambiado la forma en que nos relacionamos con el bienestar.
                </p>
            </div>
        </div>

        <!-- Enfoque actual -->
        <div class="bg-gradient-to-r from-green-400 to-blue-500 rounded-lg shadow-lg p-8 mb-12 text-white">
            <h3 class="text-2xl font-bold mb-4">Enfoque Actual de la Salud</h3>
            <p class="text-lg leading-relaxed mb-4">
                El enfoque actual es más preventivo y personalizado. Desde el punto de vista psicológico, una buena salud mental fortalece la resiliencia, la autoestima y la calidad de vida. Socialmente, promueve entornos más solidarios y funcionales.
            </p>
            <p class="text-lg leading-relaxed">
                Hoy más que nunca, la salud no solo se valora como un recurso médico, sino como un <strong>derecho</strong>, una <strong>inversión</strong> y un <strong>pilar para el desarrollo humano</strong>.
            </p>
        </div>

        <!-- Call to Action para registro -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-8 text-center border-l-4 border-cyan-500">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">¿Quieres acceso completo a nuestros recursos de salud?</h3>
            <p class="text-gray-600 mb-6">
                Regístrate gratis y accede a planes personalizados, seguimiento de salud y mucho más.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="bg-cyan-600 hover:bg-cyan-700 text-white font-bold py-3 px-8 rounded-lg transition duration-300">
                    Registrarse Gratis
                </a>
                <a href="{{ route('login') }}" class="border border-cyan-600 text-cyan-600 hover:bg-cyan-50 font-bold py-3 px-8 rounded-lg transition duration-300">
                    Iniciar Sesión
                </a>
            </div>
        </div>

        <!-- Noticias de Salud -->
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Últimas Noticias de Salud</h2>

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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                    <p class="text-gray-500 text-xl">No se encontraron noticias en este momento.</p>
                    <p class="text-gray-400">Vuelve más tarde para ver las últimas actualizaciones sobre salud.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
