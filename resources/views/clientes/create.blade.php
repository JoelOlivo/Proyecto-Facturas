<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if ($cliente->id)
                {{ __('Editar Cliente') }}                
            @else
                {{ __('Agregar Cliente') }}
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-1">
                <a href="{{route('clientes.index')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Listado de Clientes
                </a>
            </div> <br>    
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-wrap -mx-3 mb-5">
                    <div class="w-full max-w-full px-3 mb-6  mx-auto">
                        <form method="POST" 
                            @if ($cliente->id)
                                action="{{ route('clientes.update', ['cliente' => $cliente]) }}"
                            @else
                                action="{{ route('clientes.store') }}"
                            @endif
                        enctype="multipart/form-data">
                        @if ($cliente->id)
                            {{ method_field('PUT')}}
                        @endif
                        @csrf
                            <div>
                                <x-label for="numero_identidad" value="{{ __('Número De Identidad') }}" />
                                <x-input id="numero_identidad" class="block mt-1 w-full" type="number" name="numero_identidad" value="{{ old('numero_identidad', $cliente->numero_identidad)}}"/>
                                @error('numero_identidad')
                                    <span class="text-sm text-red-600" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-label for="nombre" value="{{ __('Nombre') }}" />
                                <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" value="{{ old('nombre', $cliente->nombre )}}"/>
                                @error('nombre')
                                    <span class="text-sm text-red-600" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-label for="email" value="{{ __('Email') }}" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email', $cliente->email )}}"/>
                                @error('email')
                                    <span class="text-sm text-red-600" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                            
                            <div class="mt-4">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    @if ($cliente->id)
                                    Actualizar
                                    @else
                                    Guardar
                                    @endif
                                </button>
                            </div>         
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-alouyt>
