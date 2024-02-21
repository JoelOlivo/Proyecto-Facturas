<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('status'))
                <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
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
                </div>
            @endif

            <div class="mt-1">
                <a href="{{route('facturas.create')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Agregar Factura</a>
                   
            </div> <br>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- component -->
 
                <link rel="stylesheet"
                    href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/riva-dashboard-tailwind/riva-dashboard.css">
                <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet"/>
                <div class="flex flex-wrap -mx-3 mb-5">
                    <div class="w-full max-w-full px-3 mb-6  mx-auto">
                        <div
                            class="relative flex-[1_auto] flex flex-col break-words min-w-0 bg-clip-border rounded-[.95rem] bg-white m-5">
                            <div
                                class="relative flex flex-col min-w-0 break-words border border-dashed bg-clip-border rounded-2xl border-stone-200 bg-light/30">
                                <!-- card body  -->
                                <div class="flex-auto block py-8 pt-6 px-9">
                                    <div class="overflow-x-auto">
                                        <table class="w-full my-0 align-middle text-dark border-neutral-200">
                                            <thead class="align-bottom">
                                                <tr class="font-semibold text-[0.95rem] text-secondary-dark">
                                                    <th class="pb-3 text-start min-w-[25px]">#</th>
                                                    <th class="pb-3 text-center min-w-[200px]">SERIE</th>
                                                    <th class="pb-3 text-center min-w-[200px]">COMPRADOR</th>
                                                    <th class="pb-3 text-center min-w-[50px]">ESTATUS</th>
                                                    <th class="pb-3 text-center min-w-[100px]">FECHA CREACIÓN</th>
                                                    <th class="pb-3 text-center min-w-[175px]">ACCIONES</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($facturas as $factura)
                                                
                                                <tr class="border-b border-dashed last:border-b-0">
                                                    <td class="p-3 pl-0">
                                                        <div class="flex items-center">
                                                            <div class="flex flex-col justify-start">
                                                                <span
                                                                class="font-semibold text-light-inverse text-md/normal">{{str_pad($factura->id, 4, 0, STR_PAD_LEFT)}}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="p-3 pr-0 text-start">
                                                        <span
                                                            class="font-semibold text-light-inverse text-md/normal">{{$factura->serie}}
                                                        </span>
                                                    </td>
                                                    <td class="p-3 pr-0 text-start">
                                                        <span
                                                            class="font-semibold text-light-inverse text-md/normal">{{$factura->cliente->nombre}}
                                                        </span>
                                                    </td>
                                                    <td class="p-3 pr-0 text-center">
                                                        <span
                                                            class="font-semibold text-light-inverse text-md/normal">{{$factura->status}}
                                                        </span>
                                                    </td>
                                                    <td class="p-3 pr-0 text-center">
                                                        <span
                                                            class="font-semibold text-light-inverse text-md/normal">{{$factura->created_at}}
                                                        </span>
                                                    </td>
                                                    <td class="p-3 pr-0 text-center">
                                                        <a href="{{ route('facturas.agregarProductos', ['factura' => $factura->id]) }}" class="text-gray-500 hover:text-gray-100 mr-2">
                                                            <i class="material-icons-outlined text-base">visibility</i>
                                                        </a>
                                                        {{-- <a href="{{ route('facturas.edit', ['factura' => $factura->id]) }}" class="text-yellow-400 hover:text-gray-100 mx-2">
                                                        <i class="material-icons-outlined text-base">edit</i>
                                                        </a> --}}
                                                        <form method="POST" action="{{ route('facturas.destroy', ['factura' => $factura->id]) }}">
                                                            @csrf
                                                            {{method_field("DELETE")}}
                                                            <button type="submit" @click.prevent="$root.submit();">
                                                                <i class="material-icons-round text-base">delete_outline</i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
