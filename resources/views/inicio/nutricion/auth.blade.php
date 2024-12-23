@auth
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Nutricion') }}
            </h2>
        </x-slot>
        <div class="mt-3">
            <h1>Bienvenido a la sección de Nutrición</h1>
            <p>Aprende sobre hábitos alimenticios saludables, recetas, y más.</p>

            <section>
                <h2>Consejos de nutrición</h2>
                <ul>
                    <li>Comer frutas y verduras.</li>
                    <li>Hidratarse adecuadamente.</li>
                    <li>Controlar las porciones.</li>
                </ul>
            </section>
        </div>
    </x-app-layout>
@endauth
