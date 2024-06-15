<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LindungiSiKecil || Profile</title>
    <link rel="icon" href="{{ asset('image/logoLindungiSiKecil-removebg-preview2.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-red-300">
    {{-- navbar --}}
    @extends('layout.navbar')
    {{-- navbar selesai --}}

    <div class="p-4 pt-[90px]">
        <div class="p-4 border-2 border-gray-200 border-dashed bg-neutral-50 rounded-lg">
            <div class="container px-3 pt-3">
                {{-- breadcrumb --}}
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
                                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Profile
                                    Anak</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="container mx-auto px-2 pt-8 pb-4">
                <h1 class="text-2xl font-sans font-bold text-gray-600 mb-6 lg:text-3xl">Selamat Datang,
                    <span class="underline underline-offset-3 decoration-8 decoration-red-400 dark:decoration-blue-600">

                        {{ Auth::user()->username }}🤞
                    </span>
                </h1>
            </div>

            {{-- data user --}}
            <div
                class="container mx-auto border-2 mb-5 border-red-300 border-dashed bg-white p-4 overflow-x-auto shadow-sm rounded-lg pt-3 lg:w-3/4">
                <div class="flex justify-center">
                    <h1 class="text-xl font-sans font-bold text-gray-700 mb-2 mt-3 lg:text-xl">Profile Anak</h1>
                </div>
                <form action="" class="lg:p-8">
                    {{-- input nama --}}
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-700 dark:text-white">Nama
                        anak</label>
                    <input type="text" id="name" id="disabled-input" aria-label="disabled input"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed"
                        placeholder="{{ $child->name }}" disabled>
                    {{-- input nama selesai --}}

                    {{-- input tanggal lahir --}}
                    <label for="date"
                        class="block mb-2 mt-4 text-sm font-medium text-gray-700 dark:text-white">Tanggal lahir</label>
                    <input type="email" id="date" id="disabled-input" aria-label="disabled input"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed"
                        placeholder="{{ $child->date_of_birth }}" disabled>
                    {{-- input email selesai --}}

                    {{-- input usia --}}
                    <label for="usia"
                        class="block mb-2 mt-4 text-sm font-medium text-gray-700 dark:text-white">Usia</label>
                    <div class="flex items-center">
                        <input type="text" id="usia" autocomplete="current-password" aria-label="disabled input"
                            aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border-gray-300 text-gray-500 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed"
                            value="{{ $age }}" disabled>
                    </div>
                    {{-- input usia selesai --}}

                    {{-- input usia --}}
                    <label for="usia"
                        class="block mb-2 mt-4 text-sm font-medium text-gray-700 dark:text-white">Jenis kelamin</label>
                    <div class="flex items-center">
                        <input type="text" id="usia" autocomplete="current-password" aria-label="disabled input"
                            aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border-gray-300 text-gray-500 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed"
                            value="{{ $child->gender }}" disabled>
                    </div>
                    {{-- input usia selesai --}}
                    <div class="flex justify-center gap-5 mt-3 ">
                        <a href="/user/profile-anak/edit/{{ $child->id }}" type="submit" id="submit-button"
                            class="text-white flex mt-2 items-center bg-blue-700 animate transition duration-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-1/2 justify-center lg:w-1/3">
                            Ubah Data Anak
                        </a>
                        <a data-modal-target="popup-modal-{{ $child->id }}"
                            data-modal-toggle="popup-modal-{{ $child->id }}" id="submit-button"
                            class="text-white flex mt-2 items-center cursor-pointer bg-red-700 animate transition duration-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-1/2 justify-center lg:w-1/3">
                            Hapus Data Anak
                        </a>
                    </div>
                </form>
            </div>
            {{-- data user selesai --}}

        </div>
    </div>
    {{-- modal validasi hapus --}}
    <div id="popup-modal-{{ $child->id }}" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full animated fadeIn faster">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="popup-modal-{{ $child->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                        Apakah anda yakin ingin menghapus data {{ $child->name }}?</h3>
                    <form method="GET" action="/user/profile-anak/delete/{{ $child->id }}">
                        @csrf @method('DELETE')
                        <button type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Ya, saya yakin
                        </button>

                        <button data-modal-hide="popup-modal-{{ $child->id }}" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal validasi hapus --}}
    @vite('resources/js/app.js')
</body>

</html>
