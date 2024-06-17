<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LindungiSiKecil || Grafik Pertumbuhan Anak</title>
    <link rel="icon" href="{{ asset('image/logoLindungiSiKecil-removebg-preview2.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .chart-canvas {
            display: block;
            width: 100% !important;
            height: auto !important;
        }
    </style>

</head>

<body class="bg-red-300">

    @extends('layout.navbar')

    <div class="p-4 pt-[90px]">
        <div class="p-4 border-2 border-gray-200 border-dashed bg-neutral-50 shadow-lg rounded-lg">
            {{-- breadcrumb --}}
            <div class="container px-3 pt-3">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href="/user/dashboard"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-red-600 dark:text-gray-400 dark:hover:text-white">
                                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                </svg>
                                Dashboard
                            </a>
                        </li>

                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Grafik
                                    Pertumbuhan Anak</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="container px-2 pt-8">
                <h1 class="text-2xl font-sans font-bold text-gray-600 mb-6 lg:text-3xl">
                    <span class="underline underline-offset-3 decoration-8 decoration-red-400 dark:decoration-blue-600">
                        Grafik Pertumbuhan Anak
                    </span>
                </h1>
            </div>

            {{-- card anak --}}
            <div class="flex lg:flex-row">
                <div class=" flex px-2 pt-8 truncate ">
                    <div class="carousel overflow-x-auto hide-scrollbar scroll-smooth">
                        @forelse ($childs as $child_with_age)
                            <div class="carousel-item inline-block cursor-pointer">
                                <a data-child-id="{{ $child_with_age['id_child'] }}" class="mr-2">
                                    <div
                                        class="w-52 max-w-sm px-4 py-3 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 md:w-64 lg:w-72 overflow-hidden">
                                        <div class="flex items-center ">
                                            <img class="mb-3 rounded-full shadow-md" src="{{ asset('image/man.png') }}"
                                                alt="Bonnie image" width="50" />
                                            <div class=" px-2">
                                                <p
                                                    class="text-ellipsis mb-1 text-xl font-medium text-gray-900 dark:text-white">
                                                    {{ $child_with_age['child']->name }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex ">
                                            <span
                                                class="text-sm text-gray-500 dark:text-gray-400">{{ $child_with_age['age'] }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
                {{-- card anak selesai --}}
            </div>

            <hr class="mt-8">

            <div class="container mx-auto ">
                <div class="py-[65px]">
                    @forelse ($childs as $child_with_age)
                        <div class="hidden" id="child-data-{{ $child_with_age['id_child'] }}">

                            {{-- card kelola pertumbuhan anak --}}
                            <div class="px-2 mb-5 lg:flex-none">
                                <div
                                    class="w-40 max-w-sm px-4 py-3 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 overflow-hidden">
                                    <a href="/user/manage-growth/{{ $child_with_age['id_child'] }}">
                                        <div class="grid justify-items-center text-gray-500 hover:text-gray-900">
                                            <img src="{{ asset('image/self-development.png') }}"
                                                class="text-gray-500 hover:text-gray-900" width="55"
                                                fill="currentColor">
                                            <p
                                                class="text-ellipsis text-center pt-2 text-sm font-medium  dark:text-white">
                                                Kelola Pertumbuhan Anak
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            {{-- card kelola pertumbuhan anak selesai --}}


                            {{-- eror berat badan --}}
                            <div class="container ">
                                <div id="alert-weight-{{ $child_with_age['id_child'] }}"
                                    class="hidden items-center p-4 text-red-800 rounded-lg mb-3 bg-red-50"
                                    role="alert">
                                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div id="erorWeight" class="ms-3 text-sm font-medium">

                                    </div>
                                </div>
                            </div>
                            {{-- eror berat badan selesai --}}

                            {{-- berat badan --}}
                            <div class="w-full p-10 mb-5 bg-white rounded-lg">
                                <canvas class="chart-canvas" id="myWeight-{{ $child_with_age['id_child'] }}"></canvas>
                            </div>
                            {{-- berat badan selesai --}}

                            {{-- eror panjang badan --}}
                            <div class="container ">
                                <div id="alert-length-{{ $child_with_age['id_child'] }}"
                                    class="hidden items-center p-4 text-red-800 rounded-lg mb-4 bg-red-50"
                                    role="alert">
                                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div id="erorLength" class="ms-3 text-sm font-medium">

                                    </div>
                                </div>
                            </div>
                            {{-- eror panjang badan selesai --}}

                            {{-- panjang badan --}}
                            <div class="p-10 mb-5 bg-white rounded-lg">
                                <canvas class="chart-canvas" id="myHeight-{{ $child_with_age['id_child'] }}"></canvas>
                            </div>
                            {{-- panjang badan selesai --}}

                            {{-- eror lingkar kepala --}}
                            <div class="container ">
                                <div id="alert-head-{{ $child_with_age['id_child'] }}"
                                    class="hidden items-center p-4 text-red-800 rounded-lg mb-4 bg-red-50 "
                                    role="alert">
                                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div id="erorHead" class="ms-3 text-sm font-medium">

                                    </div>
                                </div>
                            </div>
                            {{-- eror lingkar kepala selesai --}}

                            {{-- lingkar kepala --}}
                            <div class="p-10 bg-white rounded-lg">
                                <canvas class="chart-canvas" id="myHead-{{ $child_with_age['id_child'] }}"></canvas>
                            </div>
                            {{-- lingkar kepala selesai --}}

                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- sidebar  --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/growth-chart.js') }}"></script>


    @vite('resources/js/app.js')
</body>

</html>
