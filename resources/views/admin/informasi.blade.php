<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informasi Vaksin</title>
    <link rel="icon" href="{{ asset('image/logoLindungiSiKecil-removebg-preview2.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .tree-line {

            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            /* Number of lines to show */
            line-height: 1.5;
            /* Adjust based on your font size */
            max-height: calc(3 * 1.5em);
            /* 3 lines times line-height */
        }

        .dot {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap
        }


        /* Pastikan CSS khusus tidak menimpa gaya default untuk list */
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
            <div class="container mx-auto px-4 pt-8">
                <h1
                    class="text-2xl font-sans font-bold text-gray-600 mb-6 underline underline-offset-3 decoration-8 decoration-red-400 dark:decoration-blue-600 lg:text-3xl">
                    Informasi vaksin
                </h1>

                {{-- tambah data --}}
                <div class=" flex pt-5 overflow-hidden lg:flex-none">
                    <a href="{{ route('admin.index.informasi') }}">
                        <div
                            class="w-40 max-w-sm px-4 py-3 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 overflow-hidden">
                            <div class="grid justify-items-center text-gray-500 hover:text-gray-900">
                                <svg xmlns="http://www.w3.org/2000/svg" width="55" fill="currentColor"
                                    class="bi bi-plus-circle-dotted" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0q-.264 0-.523.017l.064.998a7 7 0 0 1 .918 0l.064-.998A8 8 0 0 0 8 0M6.44.152q-.52.104-1.012.27l.321.948q.43-.147.884-.237L6.44.153zm4.132.271a8 8 0 0 0-1.011-.27l-.194.98q.453.09.884.237zm1.873.925a8 8 0 0 0-.906-.524l-.443.896q.413.205.793.459zM4.46.824q-.471.233-.905.524l.556.83a7 7 0 0 1 .793-.458zM2.725 1.985q-.394.346-.74.74l.752.66q.303-.345.648-.648zm11.29.74a8 8 0 0 0-.74-.74l-.66.752q.346.303.648.648zm1.161 1.735a8 8 0 0 0-.524-.905l-.83.556q.254.38.458.793l.896-.443zM1.348 3.555q-.292.433-.524.906l.896.443q.205-.413.459-.793zM.423 5.428a8 8 0 0 0-.27 1.011l.98.194q.09-.453.237-.884zM15.848 6.44a8 8 0 0 0-.27-1.012l-.948.321q.147.43.237.884zM.017 7.477a8 8 0 0 0 0 1.046l.998-.064a7 7 0 0 1 0-.918zM16 8a8 8 0 0 0-.017-.523l-.998.064a7 7 0 0 1 0 .918l.998.064A8 8 0 0 0 16 8M.152 9.56q.104.52.27 1.012l.948-.321a7 7 0 0 1-.237-.884l-.98.194zm15.425 1.012q.168-.493.27-1.011l-.98-.194q-.09.453-.237.884zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a7 7 0 0 1-.458-.793zm13.828.905q.292-.434.524-.906l-.896-.443q-.205.413-.459.793zm-12.667.83q.346.394.74.74l.66-.752a7 7 0 0 1-.648-.648zm11.29.74q.394-.346.74-.74l-.752-.66q-.302.346-.648.648zm-1.735 1.161q.471-.233.905-.524l-.556-.83a7 7 0 0 1-.793.458zm-7.985-.524q.434.292.906.524l.443-.896a7 7 0 0 1-.793-.459zm1.873.925q.493.168 1.011.27l.194-.98a7 7 0 0 1-.884-.237zm4.132.271a8 8 0 0 0 1.012-.27l-.321-.948a7 7 0 0 1-.884.237l.194.98zm-2.083.135a8 8 0 0 0 1.046 0l-.064-.998a7 7 0 0 1-.918 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
                                </svg>
                                <p class="text-ellipsis pt-2 text-sm font-medium  dark:text-white">
                                    Tambah Data
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                {{-- tambah data selesai --}}
            </div>
            {{-- search --}}
            <div class="container mx-auto px-4 pt-8">
                <form action="{{ route('admin.search.informasi') }}" method="GET" class="max-w-md mx-auto">
                    @csrf
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="searchUser"
                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Cari informasi vaksin" />
                    </div>
                </form>
            </div>
            {{-- search selesai --}}
            <div align="center" class="container px-4 pt-[50px] lg:flex lg:justify-center">
                <div class="container" id="searchResult">
                    <div class="flex flex-wrap">
                        @forelse ($information as $informations => $data)
                            {{-- informasi vaksin --}}
                            <div class="w-full {{ count($information) == 1 ? '' : 'md:w-1/2 lg:w-1/2' }}">
                                <div
                                    class="block max-w-sm p-[15px] mb-4 md:mr-8 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                                    {{-- button dropdown delete and edit --}}
                                    <div class="flex justify-end">
                                        <button id="dropdownButton-{{ $data->id_information }}"
                                            data-dropdown-toggle="dropdown-{{ $data->id_information }}"
                                            class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                                            type="button">
                                            <span class="sr-only">Open dropdown</span>
                                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 16 3">
                                                <path
                                                    d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="">
                                        <h5
                                            class="mb-2 text-2xl text-left font-bold tracking-tight text-gray-900 dot dark:text-white">
                                            {{ $data->heading }}</h5>
                                        <p id="clamped-text"
                                            class="font-normal text-left text-gray-700 relative z-10 line-clamp-3 ck-content">
                                            {{ Str::limit(strip_tags($data->body), 200) }}
                                        </p>
                                        <div class="flex justify-start relative z-20 mt-3">
                                            <a href="/admin/detail-informasi/{{ $data->id_information }}"
                                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Baca Selengkapnya
                                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 10">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- dropdown menu edit and delete --}}
                            <div id="dropdown-{{ $data->id_information }}"
                                class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 ">
                                <ul class="py-2" aria-labelledby="dropdownButton-{{ $data->id_information }}">
                                    <li>
                                        <a href="/admin/edit-informasi/{{ $data->id_information }}"
                                            class="block px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Ubah</a>
                                    </li>
                                    <li align="left">
                                        <a data-modal-target="popup-modal-{{ $data->id_information }}"
                                            data-modal-toggle="popup-modal-{{ $data->id_information }}"
                                            class="block px-4 py-2 text-left text-sm cursor-pointer text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white transition duration-300">Hapus</a>
                                    </li>
                                </ul>
                            </div>
                            {{-- dropdown menu edit and delete selesai --}}

                            {{-- modal validasi hapus --}}
                            <div id="popup-modal-{{ $data->id_information }}" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full animated fadeIn faster">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="popup-modal-{{ $data->id_information }}">
                                            <svg class="w-3 h-3" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                Apakah anda yakin ingin menghapus artikel ini?</h3>
                                            <form method="POST"
                                                action="/admin/hapus-informasi/{{ $data->id_information }}">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                    Ya, saya yakin
                                                </button>

                                                <button data-modal-hide="popup-modal-{{ $data->id_information }}"
                                                    type="button"
                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- modal validasi hapus --}}

                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="flex justify-center pt-4">
                {{-- {{ $information->links() }} --}}
                <nav aria-label="Page navigation example">
                    <ul class="inline-flex -space-x-px text-base h-10">
                        <li>
                            @if ($information->onFirstPage())
                                <span
                                    class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg cursor-not-allowed opacity-50">Previous</span>
                            @else
                                <a href="{{ $information->previousPageUrl() }}"
                                    class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                            @endif
                        </li>

                        @for ($i = 1; $i <= $information->lastPage(); $i++)
                            <li>
                                <a href="{{ $information->url($i) }}"
                                    class="{{ $information->currentPage() == $i ? 'bg-blue-500 text-white' : 'text-gray-500 bg-white border border-e-0 border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' }} flex items-center justify-center px-4 h-10 leading-tight">{{ $i }}</a>
                            </li>
                        @endfor

                        <li>
                            @if ($information->hasMorePages())
                                <a href="{{ $information->nextPageUrl() }}"
                                    class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                            @else
                                <span
                                    class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg cursor-not-allowed opacity-50">Next</span>
                            @endif
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function clampText(element, lines) {
                const lineHeight = parseFloat(getComputedStyle(element).lineHeight);
                const maxHeight = lines * lineHeight;
                element.style.maxHeight = `${maxHeight}px`;
            }

            const element = document.getElementById('clamped-text');
            clampText(element, 3);
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#searchUser').on('keyup', function() {
                var query = $(this).val();
                $.ajax({
                    url: "{{ route('admin.search.informasi') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        query: query
                    },
                    success: function(data) {
                        $('#searchResult').html(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            });
        });
    </script>
    @vite('resources/js/app.js')


</body>

</html>
