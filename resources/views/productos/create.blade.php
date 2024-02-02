<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-wrap -mx-3 mb-5">
                    <div class="w-full max-w-full px-3 mb-6  mx-auto">
                        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <x-label for="nombre" value="{{ __('Nombre') }}" />
                                <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"/>
                                @error('nombre')
                                    <span class="text-sm text-red-600" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-label for="precio" value="{{ __('Precio') }}" />
                                <x-input id="precio" class="block mt-1 w-full" type="number" name="precio" step="0.01"/>
                                @error('precio')
                                    <span class="text-sm text-red-600" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="mt-4">
                                <x-label for="imagen" value="{{ __('Imagen') }}" />
                                <x-input id="imagen" type="file" name="imagen"/>
                                @error('imagen')
                                    <span class="text-sm text-red-600" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-alouyt>
