<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informasi Vaksin</title>
    <link rel="icon" href="{{ asset('image/logoLindungiSiKecil-removebg-preview2.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-red-300">
    {{-- sidebar --}}
    @extends('layout.navbar')
    {{-- sidebar selesai --}}

    <div class="p-4 pt-[90px]">
        <div class="p-4 border-2 border-gray-200 border-dashed bg-neutral-50 rounded-lg">
            <div class="container px-4 pt-3">
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
                                <span
                                    class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Informasi
                                    Vaksin</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            {{-- search --}}
            <div class="container mx-auto px-4 pt-8">
                <form action="{{ route('user.search.informasi') }}" method="GET" class="max-w-md mx-auto">
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
            {{-- card information --}}
            <div align="center" class="container mx-auto px-4 pt-[50px] lg:flex lg:justify-center">
                <div class="container" id="searchResult">
                    <div class="flex flex-wrap">
                        @forelse ($information as $informations => $data)
                            {{-- informasi vaksin --}}
                            <div class="w-full {{ count($information) == 1 ? '' : 'md:w-1/2 lg:w-1/3' }}">
                                <div
                                    class="block max-w-sm p-6 mb-4 md:mr-8 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                                    <h5
                                        class="mb-2 text-2xl text-left font-bold tracking-tight text-gray-900 dot dark:text-white">
                                        {{ $data->heading }}</h5>
                                    <p id="clamped-text"
                                        class="font-normal text-left text-gray-700 line-clamp-3 ck-content">
                                        {!! Str::limit(strip_tags($data->body), 200) !!}
                                    </p>
                                    <div class="flex justify-start mt-3">
                                        <a href="/user/detail-informasi/{{ $data->id_information }}"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Baca Selengkapnya
                                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
            {{-- card information --}}
            {{-- pagination --}}
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
            {{-- pagination selesai --}}
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchUser').on('keyup', function() {
                var query = $(this).val();
                $.ajax({
                    url: "{{ route('user.search.informasi') }}",
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
