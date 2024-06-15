<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informasi Vaksin || {{ $detail->heading }}</title>
    <link rel="icon" href="{{ asset('image/logoLindungiSiKecil-removebg-preview2.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* CSS untuk menargetkan link dalam artikel */
        .article-content a {
            color: blue;

        }

        /* Pastikan CSS khusus tidak menimpa gaya default untuk list */
        .article-content ol {
            list-style-type: decimal;
            /* Pastikan list-style-type diatur ke decimal */
            margin-left: 20px;
            /* Tambahkan margin jika diperlukan untuk indentasi */
        }
    </style>
</head>

<body class="bg-red-300">

    {{-- sidebar --}}
    @extends('layout.sidebar-admin')
    {{-- sidebar selesai --}}
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed bg-neutral-50 rounded-lg dark:border-gray-700">
            {{-- button sidebar --}}
            <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar"
                aria-controls="default-sidebar" type="button"
                class="inline-flex items-center p-2 mt-2 ms-3 text-sm bg-red-100 text-gray-500 rounded-lg sm:hidden hover:bg-red-400 hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                    </path>
                </svg>
            </button>
            {{-- button sidebar selesai --}}

            {{-- judul --}}
            <div class="container mx-auto px-4 pt-8">
                <h1
                    class="text-2xl font-sans font-bold text-gray-600 mb-6 underline underline-offset-3 decoration-8 decoration-red-400 dark:decoration-blue-600 lg:text-3xl">
                    {{ $detail->heading }}
                </h1>
            </div>
            {{-- judul selesai --}}

            <div class="container px-4 pt-5">

                {{-- body --}}
                <div class="bg-red-50 p-4 rounded-lg">
                    <article class="text-wrap article-content">
                        <p class="text-justify whitespace-break-spaces text-gray-700">{!! $detail->body !!}</p>
                    </article>
                </div>
                {{-- body selesai --}}

                <div class="mt-3">
                    <a href="/admin/edit-informasi/{{ $detail->id_information }}" type="submit" id="button1"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Ubah
                        Data</a>
                    <button type="submit" data-modal-target="popup-modal-{{ $detail->id_information }}"
                        data-modal-toggle="popup-modal-{{ $detail->id_information }}"
                        class="text-white
                        bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium
                        rounded-lg text-sm px-5 py-2.5 text-center">Hapus</button>
                </div>
            </div>
        </div>

        <div id="popup-modal-{{ $detail->id_information }}" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full animated fadeIn faster">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="popup-modal-{{ $detail->id_information }}">
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
                            Apakah anda yakin ingin menghapus artikel ini?</h3>
                        <form method="POST" action="/admin/hapus-informasi/{{ $detail->id_information }}">
                            @csrf @method('DELETE')
                            <button type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Ya, saya yakin
                            </button>

                            <button data-modal-hide="popup-modal-{{ $detail->id_information }}" type="button"
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
