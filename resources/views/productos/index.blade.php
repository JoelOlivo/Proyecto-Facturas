<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                                                    <th class="pb-3 text-center min-w-[200px]">NOMBRE</th>
                                                    <th class="pb-3 text-center min-w-[50px]">PRECIO</th>
                                                    <th class="pb-3 text-center min-w-[100px]">FECHA CREACIÓN</th>
                                                    <th class="pb-3 text-center min-w-[175px]">ACCIONES</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($productos as $producto)
                                                
                                                <tr class="border-b border-dashed last:border-b-0">
                                                    <td class="p-3 pl-0">
                                                        <div class="flex items-center">
                                                            <div class="flex flex-col justify-start">
                                                                <span
                                                                class="font-semibold text-light-inverse text-md/normal">{{str_pad($producto->id, 4, 0, STR_PAD_LEFT)}}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="p-3 pr-0 text-start">
                                                        <div
                                                            class="relative inline-block shrink-0 rounded-2xl me-3">
                                                            <img src="{{$producto->imagen}}"
                                                                class="w-[50px] h-[50px] inline-block shrink-0 rounded-2xl"
                                                                alt="">
                                                        </div>
                                                        <span
                                                            class="font-semibold text-light-inverse text-md/normal">{{$producto->nombre}}
                                                        </span>
                                                    </td>
                                                    <td class="p-3 pr-0 text-center">
                                                        <span
                                                            class="font-semibold text-light-inverse text-md/normal">{{$producto->precio}}
                                                        </span>
                                                    </td>
                                                    <td class="p-3 pr-0 text-center">
                                                        <span
                                                            class="font-semibold text-light-inverse text-md/normal">{{$producto->created_at}}
                                                        </span>
                                                    </td>
                                                    <td class="p-3 pr-0 text-center">
                                                        <a href="#" class="text-gray-500 hover:text-gray-100 mr-2">
                                                            <i class="material-icons-outlined text-base">visibility</i>
                                                          </a>
                                                          <a href="#" class="text-yellow-400 hover:text-gray-100 mx-2">
                                                            <i class="material-icons-outlined text-base">edit</i>
                                                          </a>
                                                          <a
                                                            href="#"
                                                            class="text-red-400 hover:text-gray-100 ml-2"
                                                          >
                                                            <i class="material-icons-round text-base">delete_outline</i>
                                                          </a>
                                                    </td>
                                                </tr>
                                                @endforeach
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
