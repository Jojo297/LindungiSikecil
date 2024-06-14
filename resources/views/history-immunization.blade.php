<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LindungiSiKecil || Riwayat Imunisasi</title>
    <link rel="icon" href="{{ asset('image/logoLindungiSiKecil-removebg-preview2.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
</head>

<body class="bg-red-300">

    @extends('layout.navbar')
    <div class="p-4 pt-[90px]">
        <div class="p-4 border-2 border-gray-200 border-dashed bg-neutral-50 rounded-lg dark:border-gray-700">
            {{-- breadcrumb --}}
            <div class="container px-4 pt-3">
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
                        <li>
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <a href="/user/schedule"
                                    class="ms-1 text-sm font-medium text-gray-700 hover:text-red-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Jadwal
                                    Imunisasi</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Riwayat
                                    Imunisasi</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="container mx-auto px-2 pt-8">
                <h1 class="text-2xl font-sans font-bold text-gray-600 mb-6 lg:text-3xl">
                    <span class="underline underline-offset-3 decoration-8 decoration-red-400 dark:decoration-blue-600">

                        Riwayat Imunisasi
                    </span>
                </h1>
            </div>

            <div class="flex lg:flex-row">
                <div class="flex px-2 pt-8 truncate">
                    <div class="carousel overflow-x-auto hide-scrollbar scroll-smooth">
                        @forelse ($childs as $child_with_data)
                            <div class="carousel-item inline-block cursor-pointer">
                                <a data-child-id="{{ $child_with_data['id_child'] }}" class="mr-2">
                                    <div
                                        class="w-52 max-w-sm px-4 py-3 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 md:w-64 lg:w-72 overflow-hidden">
                                        <div class="flex items-center">
                                            <img class="mb-3 rounded-full shadow-md" src="{{ asset('image/man.png') }}"
                                                alt="Bonnie image" width="50" />
                                            <div class="px-2">
                                                <p
                                                    class="text-ellipsis mb-1 text-xl font-medium text-gray-900 dark:text-white">
                                                    {{ $child_with_data['child']->name }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <span
                                                class="text-sm text-gray-500 dark:text-gray-400">{{ $child_with_data['age'] }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty

                            <div id="alert-2"
                                class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 w-full"
                                role="alert">
                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div class="ms-3 text-sm font-medium">
                                    Anda belum menambahkan data anak
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <hr class="mt-8">

            <div class="container mx-auto">
                <div class="py-[65px]">
                    @forelse ($childs as $child_with_data)
                        <div class="hidden" id="child-data-{{ $child_with_data['id_child'] }}">
                            <h1 class="text-xl text-center font-sans font-bold text-gray-600 mb-6 lg:text-3xl">
                                <span
                                    class="underline underline-offset-3 decoration-8 decoration-red-400 dark:decoration-blue-600">
                                    {{ $child_with_data['child']->name }}
                                </span>
                            </h1>


                            <div class="relative bg-white p-4 overflow-x-auto mt-10 shadow-md rounded-lg">
                                <table id="myTable-{{ $child_with_data['id_child'] }}" class="stripe display compact"
                                    style="width:100%">
                                    <thead align="center">
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal imunisasi</th>
                                            <th>Vaksin</th>
                                        </tr>
                                    </thead>
                                    <tbody align="center">
                                        @foreach ($child_with_data['history'] as $index => $history)
                                            @if ($history->id_child == $child_with_data['id_child'])
                                                <tr align="center">
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $history->immunization_date }}</td>
                                                    <td>
                                                        <button
                                                            data-modal-target="modal-{{ $history->id_child }}-{{ $history->id_history }}"
                                                            data-modal-toggle="modal-{{ $history->id_child }}-{{ $history->id_history }}"
                                                            class="font-medium text-blue-600 dark:text-blue-500 cursor-pointer hover:underline">
                                                            lihat vaksin
                                                        </button>
                                                    </td>
                                                </tr>

                                                <!-- modal lihat vaksin -->
                                                <div id="modal-{{ $history->id_child }}-{{ $history->id_history }}"
                                                    tabindex="-2" aria-hidden="true"
                                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                                        <!-- Modal content -->
                                                        <div
                                                            class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <!-- Modal header -->
                                                            <div
                                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                                <h3
                                                                    class="text-lg font-semibold text-gray-900 dark:text-white">
                                                                    Vaksin
                                                                </h3>
                                                                <button type="button"
                                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                    data-modal-toggle="modal-{{ $history->id_child }}-{{ $history->id_history }}">
                                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 14 14">
                                                                        <path stroke="currentColor"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                    </svg>
                                                                    <span class="sr-only">Close modal</span>
                                                                </button>
                                                            </div>
                                                            <!-- Modal body -->
                                                            <div class="p-4 md:p-5">
                                                                <p class="text-gray-500 dark:text-gray-400 mb-4">Umur
                                                                    tahun
                                                                    bulan:</p>

                                                                <ul class="space-y-4 mb-4">
                                                                    @foreach ($child_with_data['vaccines']->where('id_schedule', $history->id_schedule) as $vaccine)
                                                                        <li>
                                                                            <input type="radio" id="job-1"
                                                                                name="job" value="job-1"
                                                                                class="hidden peer" required />
                                                                            <label for="job-1"
                                                                                class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg">
                                                                                <div class="block">
                                                                                    <div
                                                                                        class="w-full text-lg font-semibold">
                                                                                        {{ $vaccine->type_vaccine }}
                                                                                    </div>
                                                                                </div>
                                                                                </form>
                                                                            </label>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- modal lihat vaksin selesai --}}
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cards = document.querySelectorAll('.carousel-item');
            let initializedTables = {};

            cards.forEach(card => {
                card.addEventListener('click', function() {
                    const childId = this.querySelector('a').dataset.childId;
                    const childDataDiv = document.getElementById(`child-data-${childId}`);
                    const otherChildDataDivs = document.querySelectorAll(`[id^="child-data-"]`);

                    otherChildDataDivs.forEach(div => {
                        if (div.id !== childDataDiv.id) {
                            div.classList.add('hidden');
                        }
                    });

                    childDataDiv.classList.toggle('hidden');

                    if (!initializedTables[childId]) {
                        $(`#myTable-${childId}`).DataTable({
                                language: {
                                    url: "{{ asset('js/id.json') }}",
                                }
                            }),
                            initializedTables[childId] = true;
                    }
                });
            });
        });
    </script>


    @vite('resources/js/app.js')
</body>

</html>
