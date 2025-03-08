@extends('welcome')
@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="max-w-4xl mx-auto text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Acerca de Nosotros</h1>
        <p class="text-lg text-gray-600">
            En <span class="font-semibold">[Tu Empresa]</span>, nos apasiona ofrecer soluciones innovadoras y efectivas. Nuestro equipo trabaja cada día para brindarte los mejores servicios con calidad y compromiso.
        </p>
    </div>

    <div class="mt-12 grid md:grid-cols-2 gap-8">
        <div class="bg-white shadow-lg rounded-2xl p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-2">Nuestra Misión</h2>
            <p class="text-gray-600">
                Brindar soluciones de alta calidad adaptadas a las necesidades de nuestros clientes, con un enfoque en la innovación y la excelencia.
            </p>
        </div>

        <div class="bg-white shadow-lg rounded-2xl p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-2">Nuestra Visión</h2>
            <p class="text-gray-600">
                Ser líderes en nuestro sector, destacándonos por nuestro compromiso, profesionalismo y satisfacción del cliente.
            </p>
        </div>
    </div>

    <div class="mt-12 flex flex-col md:flex-row justify-center items-center gap-8">
        <div class="bg-white shadow-lg rounded-2xl p-6 w-full md:w-1/3 text-center">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">+10 años de experiencia</h3>
            <p class="text-gray-600">Comprometidos con la excelencia.</p>
        </div>

        <div class="bg-white shadow-lg rounded-2xl p-6 w-full md:w-1/3 text-center">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Clientes satisfechos</h3>
            <p class="text-gray-600">Hemos trabajado con cientos de clientes.</p>
        </div>

        <div class="bg-white shadow-lg rounded-2xl p-6 w-full md:w-1/3 text-center">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Innovación constante</h3>
            <p class="text-gray-600">Siempre en busca de nuevas soluciones.</p>
        </div>
    </div>
</div>



@endsection
