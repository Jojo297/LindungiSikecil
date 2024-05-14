<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LindungiSiKecil || Jadwal Imunisasi</title>
    <link rel="icon" href="{{ asset('image/logoLindungiSiKecil-removebg-preview2.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-red-300">

    @extends('layout.navbar')

    <div class="p-4 pt-[90px]">
        <div class="p-4 border-2 border-gray-200 border-dashed bg-neutral-50 rounded-lg dark:border-gray-700">

            <div class="container mx-auto px-2 pt-8">
                <h1 class="text-2xl font-sans font-bold text-gray-600 mb-6 lg:text-3xl">
                    <span class="underline underline-offset-3 decoration-8 decoration-red-400 dark:decoration-blue-600">

                        Jadwal Imunisasi
                    </span>
                </h1>
            </div> {{-- table --}}
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
                        {{-- @forelse ($schedules as $schedule => $data) --}}
                        <tr align="center"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 ">
                            <th scope="row" width="20"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{-- {{ $schedule + 1 }} --}}
                            </th>
                            <td class="px-6 py-4">
                                {{-- {{ $data->type_vaccines }} --}}
                            </td>
                            <td class="px-6 py-4">
                                {{-- {{ $data->year }} tahun {{ $data->month }} bulan --}}
                            </td>
                            <td class="px-6 py-4 ">

                            </td>
                        </tr>

                    </tbody>
                </table>



            </div>
        </div>



    </div>
    </div>
    </div>



    @vite('resources/js/app,js')
</body>

</html>
