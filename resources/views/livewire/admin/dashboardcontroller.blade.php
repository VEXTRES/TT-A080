<div>

    <x-app-layout>

        <div class="w-full bg-[#232931] min-h-screen">

            <div class="max-w-[80%] mx-auto p-4">
                <!-- Input de búsqueda -->
                <div class="mb-4 w-[30%] relative">
                    <input type="text" placeholder="Search for company"
                        class="w-full px-[30%] sm:px-[23%]  py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200">
                        <button type="button" class="absolute inset-2 left-2  w-[15%]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                              </svg>
                        </button>
                </div>

                <!-- Tabla con Grid -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="grid grid-cols-5 bg-gray-100 py-2 px-4 font-semibold">
                        <div class="text-center">ID</div>
                        <div class="text-center">Name</div>
                        <div class="text-center">Email</div>
                        <div class="text-center">Planes Y Sondeos</div>
                        <div class="text-center">Actions</div>
                    </div>
                    @foreach ($users as $user)
                        <div class="grid grid-cols-5 gap-5 py-3 px-4 border-b mx-auto items-center ">
                            <div class="text-center">{{ $user->id }}</div>
                            <div class="text-center">{{ $user->name }}</div>
                            <div class="text-center truncate overflow-hidden md:overflow-visible md:whitespace-normal md:mr-3">
                                {{ $user->email }}
                            </div>

                            <div class=" text-center">
                                <a href="{{ route('admin.detalles-usuario', $user->id) }}" class="text-blue-500 hover:text-blue-700">ver</a>
                            </div>
                            <div class="flex justify-center space-x-5">

                                <button class="text-red-500 hover:text-red-700" wire:click="deleteUser({{$user->id}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                      </svg>

                                </button>
                            </div>
                        </div>
                    @endforeach


        </div>


    </x-app-layout>
</div>
