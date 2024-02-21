<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if ($factura->id)
                {{ __('Editar Factura') }}                
            @else
                {{ __('Agregar Factura') }}
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-1">
                <a href="{{route('facturas.index')}}" type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Listado de Facturas
                </a>
            </div> <br>    
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-wrap -mx-3 mb-5">
                    <div class="w-full max-w-full px-3 mb-6  mx-auto">
                        <form method="POST"
                        @if ($factura->id)
                            action="{{ route('facturas.update', ['factura' => $factura]) }}"
                        @else
                            action="{{ route('facturas.store') }}"
                        @endif
                            enctype="multipart/form-data">
                        @if ($factura->id)
                            {{ method_field('PUT')}}
                        @endif
                        @csrf
                            <div>
                                <x-label for="serie" value="{{ __('Clientes') }}" />
                                <select name="id_cliente" id="clientes">
                                    @foreach ($clientes as $cliente)
                                        <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <x-label for="serie" value="{{ __('Serie') }}" />
                                <select name="serie" id="serie">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                </select>
                                @error('serie')
                                    <span class="text-sm text-red-600" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    @if ($factura->id)
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
