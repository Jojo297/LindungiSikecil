<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Jadwal Imunisasi</title>
    <link rel="icon" href="{{ asset('image/logoLindungiSiKecil-removebg-preview2.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>

    {{-- delete vaccine --}}
    <script>
        // console.log(vaccineId);
        $(document).ready(function() {
            $(document).on('click', '.delete-button', function() {
                var vaccineId = $(this).data('id');
                var deleteUrl = 'admin/vaccine/' + vaccineId;
                var token = $(this).data("token");
                console.log(vaccineId, deleteUrl, token);
                $.ajax({
                    url: '/admin/vaccine/' + vaccineId,
                    type: 'DELETE',
                    data: {
                        "id_vaccine": vaccineId,
                        "_method": 'DELETE',
                        "_token": token,
                    },
                    success: function(response) {
                        if (response.success) {
                            console.log('oke');
                            // Remove the deleted item from the UI
                            $('#vaccine-' + vaccineId).remove();
                        } else {
                            alert(response.error);
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr
                            .responseText
                        ); // Menampilkan pesan kesalahan yang diberikan oleh server
                        alert('An error occurred. Please try again.');
                    }
                });
            });
        });
    </script>
    {{-- delete vaccine selesai --}}

    {{-- edit vaccine --}}
    <script>
        // $(document).ready(function() {
        //     var vaccineId = $(this).data('id');
        //     $('.delete-button-' + vaccineId).on('click', function() {
        //         // Remove the deleted item from the UI
        //         $('#vaccine-' + vaccineId).remove();

        //     });
        // });
    </script>
    {{-- edit vaccine selesai --}}
</head>

<body class="bg-red-300">
    {{-- sidebar --}}

    @extends('layout.sidebar-admin')
    {{-- sidebar selesai --}}
    {{-- content --}}
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed bg-slate-50 rounded-lg">
            {{-- button sidebar --}}
            <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar"
                aria-controls="default-sidebar" type="button"
                class="inline-flex items-center p-2 mt-2 ms-3 text-sm bg-red-100 text-gray-500 rounded-lg sm:hidden hover:bg-red-400 hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400  dark:focus:ring-gray-600">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                    </path>
                </svg>
            </button>
            {{-- button sidebar selesai --}}
            <div class="container mx-auto px-4 pt-8 ">
                <h1
                    class="text-2xl font-sans font-bold text-gray-600 mb-6 underline underline-offset-3 decoration-8 decoration-red-400 dark:decoration-blue-600 lg:text-3xl">
                    Jadwal Imunisasi
                </h1>
                {{-- tambah data --}}
                <div class="flex pt-5 overflow-hidden lg:flex-none">
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal">
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
                    </button>
                </div>
                {{-- tambah data selesai --}}
                {{-- table --}}
                <div class="bg-white mt-10 py-5 px-5 shadow-md rounded-lg">
                    <table id="myTable" class="stripe display compact" style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    No
                                </th>
                                <th>
                                    Umur
                                </th>
                                <th>
                                    Vaksin
                                </th>

                                <th>
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                                <tr>
                                    <th>
                                        {{ $loop->index + 1 }}
                                    </th>
                                    <td>
                                        {{ $schedule->year }} tahun {{ $schedule->month }} bulan
                                    </td>
                                    <td>
                                        <button data-modal-target="modal-{{ $schedule->id_schedule }}"
                                            data-modal-toggle="modal-{{ $schedule->id_schedule }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 cursor-pointer hover:underline">lihat
                                            vaksin</button>
                                    </td>
                                    <td>
                                        <div class="">
                                            <div class="grid-cols-1">
                                                <button data-modal-target="modal-delete-{{ $schedule->id_schedule }}"
                                                    data-modal-toggle="modal-delete-{{ $schedule->id_schedule }}"
                                                    class="font-medium text-red-600 dark:text-blue-500 cursor-pointer hover:underline">Hapus</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                {{-- modal validasi hapus --}}
                                <div id="modal-delete-{{ $schedule->id_schedule }}" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full animated fadeIn faster">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button"
                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="modal-delete-{{ $schedule->id_schedule }}">
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
                                                    Are
                                                    you
                                                    Apakah anda yakin ingin menghapus data ini?</h3>
                                                <form method="POST"
                                                    action="{{ route('admin.schedule.destroy', $schedule->id_schedule) }}">
                                                    @csrf @method('DELETE')
                                                    <button type="submit"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                        Ya, saya yakin
                                                    </button>

                                                    <button data-modal-hide="modal-delete-{{ $schedule->id_schedule }}"
                                                        type="button"
                                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- modal validasi hapus --}}

                                <!-- modal lihat vaksin -->
                                <div id="modal-{{ $schedule->id_schedule }}" tabindex="-2" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                    Vaksin
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-toggle="modal-{{ $schedule->id_schedule }}">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-4 md:p-5">
                                                <p class="text-gray-500 dark:text-gray-400 mb-4">Umur
                                                    {{ $schedule->year }} tahun {{ $schedule->month }} bulan:</p>

                                                <ul class="space-y-4 mb-4">
                                                    @foreach ($vaccines->where('id_schedule', $schedule->id_schedule) as $vaccine)
                                                        <li>
                                                            <input type="radio" id="job-1" name="job"
                                                                value="job-1" class="hidden peer" required />
                                                            <label for="job-1"
                                                                class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg">
                                                                <div class="block">
                                                                    <div class="w-full text-lg font-semibold">
                                                                        {{ $vaccine->type_vaccine }}
                                                                    </div>

                                                                </div>

                                                                </form>

                                                            </label>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <button data-modal-target="modal-edit-{{ $schedule->id_schedule }}"
                                                    data-modal-toggle="modal-edit-{{ $schedule->id_schedule }}"
                                                    class="text-white inline-flex w-full justify-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Ubah / Tambah data
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- modal lihat vaksin selesai --}}

                                <!-- modal edit -->
                                <div id="modal-edit-{{ $schedule->id_schedule }}" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[100] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                    Ubah Jadwal Imunisasi
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-toggle="modal-edit-{{ $schedule->id_schedule }}">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-4 md:p-5">
                                                <form id="schedule-form1"
                                                    action="/admin/schedules/edit/{{ $schedule->id_schedule }}"
                                                    class="" method="POST">
                                                    @csrf @method('POST')
                                                    <div class="grid mb-4 grid-cols-2">
                                                        <div class="col-span-2">
                                                            <label for="umur"
                                                                class="block mb-1 mt-2 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
                                                        </div>
                                                        {{-- input year --}}
                                                        <div class="col-span-1 text-center lg:col-span-1">
                                                            <label for="price"
                                                                class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Tahun</label>
                                                            <input type="number" name="year" id="year"
                                                                value="{{ $schedule->year }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm mx-auto rounded-lg h-10 focus:ring-primary-600 focus:border-primary-600 block w-20 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                        </div>
                                                        {{-- input year selesai --}}

                                                        {{-- input month --}}
                                                        <div class="col-span-1 text-center lg:col-span-1">
                                                            <label for="category"
                                                                class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Bulan</label>
                                                            <input type="number" id="month" name="month"
                                                                value="{{ $schedule->month }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm mx-auto rounded-lg h-10 focus:ring-primary-500 focus:border-primary-500 block w-20 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                            </input>
                                                        </div>
                                                        {{-- input month selesai --}}

                                                        {{-- eror year --}}
                                                        <div id="alert-4" class="col-span-1 mt-3"
                                                            style="display: none;">
                                                            <div class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                                                role="alert">
                                                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    fill="currentColor" viewBox="0 0 20 20">
                                                                    <path
                                                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                                                </svg>
                                                                <span class="sr-only">Info</span>
                                                                <div class="ms-3 text-sm font-medium"
                                                                    id="year1-error-message">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- eror year selesai --}}

                                                        {{-- eror month --}}
                                                        <div id="alert-5" class="col-span-1 ml-2 mt-3"
                                                            style="display: none;">
                                                            <div class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                                                role="alert">
                                                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    fill="currentColor" viewBox="0 0 20 20">
                                                                    <path
                                                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                                                </svg>
                                                                <span class="sr-only">Info</span>
                                                                <div class="ms-3 text-sm font-medium"
                                                                    id="month1-error-message">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- eror month selesai --}}
                                                    </div>
                                                    {{-- input vaksin --}}
                                                    <div class="col-span-2">
                                                        <label for="name"
                                                            class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                                            vaksin</label>
                                                        <div class="relative">
                                                            <div class="inset-y-0 start-0 ">
                                                                <input type="text" name="vaccins" id="vaccins"
                                                                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                    placeholder="Masukkan jenis vaksin">
                                                                <button type="button" id="add-vaccin"
                                                                    data-token1="{{ csrf_token() }}"
                                                                    class="text-white absolute end-[3px] bottom-[3px] bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 ">Masukkan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- input vaksin selesai --}}

                                                    {{-- eror vaksin --}}
                                                    <div id="alert-6" class="col-span-1 ml-2 mt-3"
                                                        style="display: none;">
                                                        <div class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                                            role="alert">
                                                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                                viewBox="0 0 20 20">
                                                                <path
                                                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                                            </svg>
                                                            <span class="sr-only">Info</span>
                                                            <div class="ms-3 text-sm font-medium"
                                                                id="vaccins1-error-message">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- eror vaksin selesai --}}

                                                    <div id="vaccin-list"
                                                        class="col-span-2 text-center font-medium text-gray-900 mb-3">
                                                        <ul id="list-vaccine" class="space-y-4 mb-4">
                                                            <input type="number" class="hidden" id="id-schedule"
                                                                value="{{ $schedule->id_schedule }}">
                                                            @foreach ($vaccines->where('id_schedule', $schedule->id_schedule) as $vaccine)
                                                                <li id="vaccine-{{ $vaccine->id_vaccine }}">
                                                                    <label for="job-1"
                                                                        class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg">
                                                                        <div class="block">
                                                                            <div class="w-full text-lg font-semibold">
                                                                                {{ $vaccine->type_vaccine }}</div>
                                                                            <input type="text" name="faksin1[]"
                                                                                value="{{ $vaccine->type_vaccine }}"
                                                                                class="hidden">
                                                                        </div>
                                                                        <button type="button" class="delete-button"
                                                                            id="delete-button-{{ $vaccine->id_vaccine }}"
                                                                            data-id="{{ $vaccine->id_vaccine }}"
                                                                            data-token="{{ csrf_token() }}">
                                                                            @csrf
                                                                            <svg class="w-5 h-5"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 448 512">
                                                                                <path fill="#e83030"
                                                                                    d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                                                            </svg>
                                                                        </button>
                                                                    </label>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                        <hr>

                                                        <button type="submit" id="submit-button1"
                                                            class="text-white inline-flex mt-2 items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor"
                                                                viewBox="0 0 20 20"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                            Ubah jadwal imunisasi
                                                        </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- modal edit selesai --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    {{-- content selesai --}}



    <!-- modal tambah -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Tambah Jadwal Imunisasi
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form id="schedule-form" class="p-4 md:p-5" action="{{ route('admin.schedule.insert') }}"
                    method="POST">
                    @csrf
                    <div class="grid mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="umur"
                                class="block mb-1 mt-2 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
                        </div>
                        {{-- input year --}}
                        <div class="col-span-1 text-center lg:col-span-1">
                            <label for="price"
                                class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Tahun</label>
                            <input type="number" name="year" id="year"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm mx-auto rounded-lg h-10 focus:ring-primary-600 focus:border-primary-600 block w-20 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        {{-- input year selesai --}}

                        {{-- input month --}}
                        <div class="col-span-1 text-center lg:col-span-1">
                            <label for="category"
                                class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Bulan</label>
                            <input type="number" id="month" name="month"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm mx-auto rounded-lg h-10 focus:ring-primary-500 focus:border-primary-500 block w-20 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </input>
                        </div>
                        {{-- input month selesai --}}

                        {{-- eror year --}}
                        <div id="alert-1" class="col-span-1 mt-3" style="display: none;">
                            <div class="flex items-center p-4 mb-4
                            text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                role="alert">
                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div class="ms-3 text-sm font-medium" id="year-error-message">
                                </div>
                            </div>
                        </div>
                        {{-- eror year selesai --}}
                        {{-- eror month --}}
                        <div id="alert-2" class="col-span-1 ml-2 mt-3" style="display: none;">
                            <div class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                role="alert">
                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div class="ms-3 text-sm font-medium" id="month-error-message">
                                </div>
                            </div>
                        </div>
                        {{-- eror month selesai --}}
                    </div>
                    {{-- input vaksin --}}
                    <div class="col-span-2">
                        <label for="name"
                            class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Jenis
                            vaksin</label>
                        <div class="relative">
                            <div class="inset-y-0 start-0 ">
                                <input type="text" name="vaccins" id="vaccins1"
                                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Masukkan jenis vaksin">
                                <button type="button" id="add-vaccin1"
                                    class="text-white absolute end-[3px] bottom-[3px] bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 ">Masukkan</button>
                            </div>
                        </div>
                    </div>
                    {{-- input vaksin selesai --}}

                    {{-- eror vaksin --}}
                    <div id="alert-3" class="col-span-1 ml-2 mt-3" style="display: none;">
                        <div class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 text-sm font-medium" id="vaccins-error-message">
                            </div>
                        </div>
                    </div>
                    {{-- eror vaksin selesai --}}

                    <div id="vaccin-list" class="col-span-2 text-center font-medium text-gray-900 mb-3">
                        <ul id="list-vaccine1">

                        </ul>
                        {{-- <input type="text" name="faksin[]">
                        <div class="py-1" name="vaccin[]">
                            "HIV"
                            <button class="delete-vaccin ml-2 text-red-700 ">X</button>
                        </div>
                        <input type="text" name="faksin[]">
                        <div class="py-1" name="vaccin[]">
                            "Polio 1"
                            <button class="delete-vaccin ml-2 text-red-700 ">X</button>
                        </div> --}}
                    </div>
                    <hr>

                    <button type="submit" id="submit-button"
                        class="text-white inline-flex mt-2 items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Tambah jadwal imunisasi
                    </button>
                </form>
            </div>
        </div>
    </div>
    {{-- modal tambah selesai --}}

    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>



    {{-- add vaccine --}}
    <script type="text/javascript">
        const vaccinList = document.getElementById('list-vaccine1');
        const addVaccinButton = document.getElementById('add-vaccin1');
        let vaccins = [];

        addVaccinButton.addEventListener('click', () => {
            const vaccinInput = document.getElementById('vaccins1');
            const vaccinValue = vaccinInput.value.trim();

            if (vaccinValue !== '') {
                vaccins.push(vaccinValue);
                // updateJsonString();
                vaccinInput.value = '';

                const vaccinListItem = document.createElement('li');
                vaccinListItem.id = 'vaccine-edit-' + vaccinValue;
                vaccinListItem.classList.add('py-1');
                vaccinListItem.innerHTML = `
            <label for="job-1" class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg">
                <div class="block">
                    <div class="w-full text-lg font-semibold">
                        ${vaccinValue}
                    </div>
                    <input type="text" name="faksin[]" value="${vaccinValue}" class="hidden">
                </div>
                <button type="button" class="delete-button-vaccine" data-id="${vaccinValue}">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="#e83030" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                    </svg>
                </button>
            </label>
        `;

                vaccinList.appendChild(vaccinListItem);

                const deleteVaccinButton = vaccinListItem.querySelector('.delete-button-vaccine');
                deleteVaccinButton.addEventListener('click', () => {
                    const index = vaccins.indexOf(vaccinValue);
                    if (index !== -1) {
                        vaccins.splice(index, 1);
                        vaccinListItem.remove();
                    }
                });

            }
        });
    </script>
    {{-- add vaccine selesai --}}

    {{-- edit vaccine --}}
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const modalButtons = document.querySelectorAll('[data-modal-target]');

            modalButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const modalId = this.dataset.modalTarget;
                    const modal = document.getElementById(modalId);

                    if (modal) {
                        const scheduleId = modal.querySelector('#id-schedule').value;
                        const addVaccinButton = modal.querySelector('#add-vaccin');
                        const vaccinInput = modal.querySelector('#vaccins');
                        const vaccineList = modal.querySelector('#list-vaccine');

                        if (addVaccinButton && vaccinInput && vaccineList) {
                            addVaccinButton.addEventListener('click', () => {
                                const vaccinValue = vaccinInput.value.trim();
                                if (vaccinValue !== '') {
                                    const token = document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute(
                                        'content');
                                    console.log(
                                        `Schedule ID: ${scheduleId}, Token: ${token}, Vaccine: ${vaccinValue}`
                                    );

                                    $.ajax({
                                        url: '/admin/insert-vaccine',
                                        type: 'POST',
                                        data: {
                                            "id_schedule": scheduleId,
                                            "type_vaccine": vaccinValue,
                                            "_method": 'POST',
                                            "_token": token,
                                        },
                                        success: function(data) {
                                            if (data.success) {
                                                const newVaccineId = data
                                                    .id_vaccine;
                                                console.log(
                                                    `New Vaccine ID: ${newVaccineId}`
                                                );

                                                const newVaccineItem = document
                                                    .createElement('li');
                                                newVaccineItem.id =
                                                    `vaccine-${newVaccineId}`;
                                                newVaccineItem.innerHTML = `
                                            <label for="job-1" class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg">
                                                <div class="block">
                                                    <div class="w-full text-lg font-semibold">${vaccinValue}</div>
                                                    <input type="text" name="faksin1[]" value="${vaccinValue}" class="hidden">
                                                </div>
                                                <button type="button" class="delete-button" id="delete-button-${newVaccineId}" data-id="${newVaccineId}" data-token="${token}">
                                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path fill="#e83030" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"/>
                                                    </svg>
                                                </button>
                                            </label>
                                        `;
                                                vaccineList.appendChild(
                                                    newVaccineItem);
                                                vaccinInput.value =
                                                    ''; // Clear input after successful submission
                                            } else {
                                                console.error(
                                                    'Data insertion failed:',
                                                    data);
                                            }
                                        },
                                        error: function(xhr, status, error) {
                                            console.error('AJAX error:', error);
                                        }
                                    });
                                } else {
                                    console.warn('Vaccine input is empty');
                                }
                            });
                        } else {
                            console.error('Essential elements not found in the modal');
                        }
                    } else {
                        console.error('Modal not found:', modalId);
                    }
                });
            });
        });
    </script>
    {{-- edit vaccine selesai --}}

    {{-- data table --}}
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                language: {
                    url: "{{ asset('js/id.json') }}",
                }
            });
        });
    </script>
    {{-- data table selesai --}}

    {{-- validation --}}
    <script>
        $(document).ready(function() {
            $("#schedule-form").validate({
                rules: {
                    year: "required",
                    month: {
                        required: true
                    },
                    vaccins: {
                        required: {
                            depends: function(element) {
                                return ($("#list-vaccine1").children().length === 0);
                            }
                        }
                    }
                },
                messages: {
                    year: "Masukkan tahun!",
                    month: {
                        required: "Masukkan bulan!"
                    },
                    vaccins: "Masukkan jenis vaksin!"
                },
                errorPlacement: function(error, element) {
                    if (element.attr("id") == "year") {
                        $("#alert-1").show();
                        $("#year-error-message").html(error.text());
                    } else if (element.attr("id") == "month") {
                        $("#alert-2").show();
                        $("#month-error-message").html(error.text());
                    } else if (element.attr("id") == "vaccins1") {
                        $("#alert-3").show();
                        $("#vaccins-error-message").html(error.text());
                    }
                }
            });
        });
    </script>
    {{-- validation selesai --}}

    <script>
        //message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
    @vite('resources/js/app.js')
</body>

</html>
