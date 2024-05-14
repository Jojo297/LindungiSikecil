<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jadwal Imunisasi</title>
    <link rel="icon" href="{{ asset('image/logoLindungiSiKecil-removebg-preview2.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-red-300">
    {{-- sidebar --}}

    @extends('layout.sidebar-admin')
    {{-- sidebar selesai --}}
    {{-- content --}}
    <div class="p-4 sm:ml-64">

        <div class="p-4 border-2 border-gray-200 border-dashed bg-slate-50 rounded-lg dark:border-gray-700 ">
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
            <div class="container mx-auto px-4 pt-8 ">
                <h1
                    class="text-2xl font-sans font-bold text-gray-600 mb-6 underline underline-offset-3 decoration-8 decoration-red-400 dark:decoration-blue-600 lg:text-3xl">
                    Jadwal Imunisasi
                </h1>
                {{-- tambah data --}}
                <div class=" flex pt-5 overflow-hidden lg:flex-none">
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal">
                        <div
                            class="w-40 max-w-sm px-4 py-3 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
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
                <div class="relative overflow-x-auto mt-10 shadow-md rounded-lg ">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700  bg-gray-200  dark:bg-gray-700 dark:text-gray-400">
                            <tr align="center">
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Vaksin
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Umur
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($schedules as $schedule => $data)
                                <tr align="center"
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 ">
                                    <th scope="row" width="20"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $schedule + 1 }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $data->type_vaccines }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $data->year }} tahun {{ $data->month }} bulan
                                    </td>
                                    <td class="px-6 py-4 ">
                                        <div class="grid grid-cols-2">
                                            <div class="col-span-1">
                                                <a href="#"
                                                    class=" font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                            </div>

                                            <div class="grid-cols-1">
                                                <form method="POST" onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('admin.schedule.destroy', $data->id_schedule) }}">
                                                    @csrf @method('DELETE')
                                                    <button type="submit"
                                                        class="font-medium text-red-600 dark:text-blue-500 cursor-pointer hover:underline">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
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
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form id="schedule-form" class="p-4 md:p-5" action="{{ route('admin.schedule.insert') }}"
                    method="POST">
                    @csrf
                    <div class="grid mb-4 grid-cols-2">
                        {{-- input vaksin --}}
                        <div class="col-span-2">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                vaksin</label>
                            <input type="text" name="vaccins" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukkan jenis vaksin">
                        </div>
                        {{-- input vaksin selesai --}}

                        {{-- eror vaksin --}}
                        <div id="eror-vaksin" class="hidden col-span-2 mt-3">
                            <div id="alert-1"
                                class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                role="alert">
                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div class="ms-3 text-sm font-medium">
                                    Masukkan jenis vaksin!
                                </div>
                            </div>
                        </div>
                        {{-- eror vaksin selesai --}}
                        <div class="col-span-2">
                            <label for="umur"
                                class="block mb-1 mt-4 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
                            <hr>
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
                        <div id="eror-year" class="hidden col-span-2 mt-3">
                            <div id="alert-2"
                                class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                role="alert">
                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div class="ms-3 text-sm font-medium">
                                    Masukkan tahun!
                                </div>
                            </div>
                        </div>
                        {{-- eror year selesai --}}
                        {{-- eror month --}}
                        <div id="eror-month" class="hidden col-span-2 mt-3">
                            <div id="alert-3"
                                class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                role="alert">
                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div class="ms-3 text-sm font-medium">
                                    Masukkan bulan!
                                </div>

                            </div>
                        </div>
                        {{-- eror month selesai --}}
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



    <script>
        // Ambil referensi ke form
        const form = document.getElementById('schedule-form');

        // Tambahkan event listener pada form
        form.addEventListener('submit', function(event) {
            // Hindari perilaku default form
            event.preventDefault();

            // Ambil referensi ke inputan
            const vaccinsInput = document.getElementById('name');
            const erorVaccins = document.getElementById('eror-vaksin');
            const yearInput = document.getElementById('year');
            const erorYear = document.getElementById('eror-year');
            const monthInput = document.getElementById('month');
            const erorMonth = document.getElementById('eror-month');

            // Cek apakah inputan kosong
            if (vaccinsInput.value.trim() === '') {
                // Tampilkan pesan error
                erorVaccins.classList.remove('hidden');
                return;
            } else {
                // Sembunyikan pesan error jika inputan tidak kosong
                erorVaccins.classList.add('hidden');
            }

            if (yearInput.value.trim() === '') {
                // Tampilkan pesan error
                erorYear.classList.remove('hidden');
                return;
            } else {
                erorYear.classList.add('hidden')
            }

            if (monthInput.value.trim() === '') {
                // Tampilkan pesan error
                erorMonth.classList.remove('hidden');
                return;
            } else {
                erorMonth.classList.add('hidden');
            }

            // Jika inputan tidak kosong, kirim formulir
            form.submit();
        });
    </script>
    <script>
        //message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
    @vite('resources/js/app,js')
</body>

</html>
