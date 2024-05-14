<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="icon" href="{{ asset('image/logoLindungiSiKecil-removebg-preview2.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-red-300">
    {{-- sidebar --}}
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm bg-gray-100 text-gray-500 rounded-lg sm:hidden hover:bg-red-400 hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>
    @extends('layout.sidebar-admin')
    {{-- sidebar selesai --}}

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed bg-neutral-50 rounded-lg dark:border-gray-700">

            <div class="container mx-auto px-4 pt-8">
                <h1 class="text-2xl font-sans font-bold text-gray-600 mb-6 lg:text-3xl">Selamat Datang,
                    <span
                        class="underline underline-offset-3 decoration-8 decoration-red-400 dark:decoration-blue-600">{{ Auth::user()->username }}🤞</span>
                </h1>
            </div>

            <div class="container mx-auto px-4">
                <div class="text-center md:text-left md:flex py-[65px] justify-evenly md:items-center lg:flex">

                    {{-- kelola jadwal imunisasi --}}

                    <a href="{{ route('admin.schedule') }}"
                        class="z-0 group block max-w-xs mx-auto rounded-lg p-6 mb-8 bg-white ring-1 ring-slate-900/5 shadow-lg space-y-3 transition hover:bg-red-400 duration-500 hover:ring-red-400 md:mb-0 lg:w-1/2">
                        <div class="flex  space-x-3">
                            <div class="text-center">
                                <h5 align="center"
                                    class="text-center mb-2 text-2xl font-sans font-semibold tracking-tight text-gray-600 transition group-hover:text-white duration-500  dark:text-white">
                                    Kelola Jadwal
                                    Imunisasi</h5>
                            </div>
                        </div>
                        <img src="{{ asset('image/calendar_clock_schedule.png') }}" class=" w-full" alt="" />
                    </a>


                    {{-- kelola infomasi vaksin --}}
                    <a href="#"
                        class="group block max-w-xs mx-auto rounded-lg p-6 bg-white ring-1 ring-slate-900/5 shadow-lg space-y-3 transition hover:bg-red-400 duration-500 hover:ring-red-400 lg:w-1/2">
                        <div class="flex  space-x-3">
                            <div class="text-center">
                                <h5 align="center"
                                    class="text-center mb-2 text-2xl font-semibold tracking-tight text-gray-600  transition group-hover:text-white duration-500  dark:text-white">
                                    Kelola Informasi Vaksin</h5>
                            </div>
                        </div>
                        <img src="{{ asset('image/informasi-vaksin.png') }}" class=" w-full" alt="" />
                    </a>
                </div>
            </div>


        </div>
    </div>
    </div>
    {{-- sidebar  --}}



    @vite('resources/js/app,js')
</body>

</html>
