<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Factura') }} {{ $factura->id }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('facturas.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 active:bg-gray-800 focus:outline-none focus:border-gray-800 focus:ring focus:ring-gray-200 disabled:opacity-25 transition mb-4">
                {{ __('Lista De Facturas') }}
            </a>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
            <div class="relative py-3 pl-4 pr-10 leading-normal text-{{ session('color') }}-700 bg-{{ session('color') }}-100 rounded-lg"
                role="alert">
                <p>{{ session('message') }}</p>
                <span class="absolute inset-y-0 right-0 flex items-center mr-4">
                    <svg class="w-4 h-4 fill-current" role="button" viewBox="0 0 20 20">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </span>
            </div>
            @endif

            <div class="overflow-hidden sm:rounded-lg">
                <div class="overflow-x-auto">
                    <div
                        class="min-w-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
                        <div class="w-full">
                            <div class="bg-white shadow-md rounded my-6">
                                <table class="min-w-max w-full table-auto">
                                    <thead>
                                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                            <th class="py-3 px-6 text-left">ID</th>
                                            <th class="py-3 px-6 text-left">SERIE</th>
                                            <th class="py-3 px-6 text-center">CLIENTE</th>
                                            <th class="py-3 px-6 text-center">ESTATUS</th>
                                            <th class="py-3 px-6 text-center">FECHA DE CREACIÓN</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 text-sm font-light">

                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span
                                                        class="font-medium">{{ str_pad($factura->id, 4,0, STR_PAD_LEFT)  }}</span>
                                                </div>
                                            </td>

                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center">
                                                    <span>{{ $factura->serie }}</span>
                                                </div>
                                            </td>

                                            <td class="py-3 px-6 text-center">
                                                <span>{{ $factura->cliente->nombre }}</span>
                                            </td>

                                            <td class="py-3 px-6 text-center">
                                                <span>{{ $factura->status }}</span>
                                            </td>

                                            <td class="py-3 px-6 text-center">
                                                <span>{{ $factura->created_at }}</span>
                                            </td>


                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <form class="grid gap-8 grid-cols-1" action="{{ route('detalleFactura.store') }}" method="POST">
                    <input type="hidden" value="{{ $factura->id }}" name="id_factura">
                    @csrf
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                            <div class="grid grid-cols-3 gap-4">
                                <div>
                                    <label for="productos" class="block text-sm font-medium text-gray-700">
                                        Productos
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <select name="id_producto" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300">
                                            <option value="">Escoge uno</option>
                                            @foreach ($productos as $producto)
                                            <option value="{{ $producto->id }}">{{ $producto->nombre }}
                                                ({{ $producto->precio }}) </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('productos')
                                    <span class=" text-sm text-red-600" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div>
                                    <label for="cantidad" class="block text-sm font-medium text-gray-700">
                                        Cantidad
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="number" name="cantidad" id="cantidad" value="{{ old('cantidad') }}"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300">
                                    </div>
                                    @error('cantidad')
                                    <span class=" text-sm text-red-600" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div>
                                    <label for="precio" class="block text-sm font-medium text-gray-700">
                                        Precio (Mantener en blanco para no modificar)
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="precio" id="precio" value="{{ old('precio') }}"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300">
                                    </div>
                                    @error('precio')
                                    <span class=" text-sm text-red-600" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Añadir
                            </button>
                        </div>
                    </div>
                </form>

                <div class="w-full">
                    <div class="bg-white rounded my-2">
                        <div class="overflow-x-auto">
                            <h3 class="font-semibold text-xl text-gray-800 leading-tight px-5 py-5">Detalle Factura
                            </h3>
                            <div
                                class="min-w-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
                                <div class="w-full">
                                    <div class="bg-white shadow-md rounded my-6">
                                        <table class="min-w-max w-full table-auto">
                                            <thead>
                                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                                    <th class="py-3 px-6 text-left">#</th>
                                                    <th class="py-3 px-6 text-left">PRODUCTO</th>
                                                    <th class="py-3 px-6 text-center">PRECIO</th>
                                                    <th class="py-3 px-6 text-center">CANTIDAD</th>
                                                    <th class="py-3 px-6 text-center">TOTAL</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-gray-600 text-sm font-light">
                                                @php
                                                $total= 0;
                                                @endphp
                                                @foreach ($detalles as $item)

                                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <span
                                                                class="font-medium">{{ str_pad($item->id, 4,0, STR_PAD_LEFT)  }}</span>
                                                        </div>
                                                    </td>

                                                    <td class="py-3 px-6 text-left">
                                                        <div class="flex items-center">
                                                            <span> {{ $item->producto->nombre }} </span>
                                                        </div>
                                                    </td>

                                                    <td class="py-3 px-6 text-center">
                                                        <span>{{ $item->precio }}</span>
                                                    </td>

                                                    <td class="py-3 px-6 text-center">
                                                        <span>{{ $item->cantidad }}</span>
                                                    </td>

                                                    <td class="py-3 px-6 text-center">
                                                        <span>{{ $item->precio_total }}</span>
                                                    </td>

                                                </tr>

                                                @php
                                                $total = $total + $item->precio_total;
                                                @endphp
                                                @endforeach
                                                <tr>
                                                    <td colspan="4" class="py-3 px-6 text-left whitespace-nowrap">
                                                        Total Factura
                                                    </td>
                                                    <td class="py-3 px-6 text-center whitespace-nowrap">
                                                        {{ $total }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" text-right">

                        <form method="POST" action="{{ route('facturas.complete', ['factura'=> $factura->id]) }}">
                            @csrf
                            <a href="{{ route('facturas.complete', ['factura'=> $factura->id]) }}" onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition mb-4">
                                {{ __('Completar y envíar') }}

                            </a>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>