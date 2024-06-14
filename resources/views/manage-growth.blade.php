<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LindungiSiKecil || Grafik Pertumbuhan Anak</title>
    <link rel="icon" href="{{ asset('image/logoLindungiSiKecil-removebg-preview2.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
</head>

<body class="bg-red-300">

    @extends('layout.navbar')

    <div class="p-4 pt-[90px]">
        <div class="p-4 border-2 border-gray-200 border-dashed bg-neutral-50 shadow-lg rounded-lg">
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
                                <a href="/user/growth-chart"
                                    class="ms-1 text-sm font-medium text-gray-700 hover:text-red-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Grafik
                                    Pertumbuhan Anak</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">
                                    Kelola Grafik Pertumbuhan Anak</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="container px-2 pt-8">
                <h1 class="text-2xl font-sans font-bold text-gray-600 mb-6 lg:text-3xl">
                    <span class="underline underline-offset-3 decoration-8 decoration-red-400 dark:decoration-blue-600">
                        {{ $name }}
                        {{-- Kelola Grafik Pertumbuhan Anak --}}
                    </span>
                </h1>
            </div>

            <hr class="mt-8 mb-8">

            <div class="container mx-auto ">
                <div>
                    <div class="mb-8">
                        {{-- tambah data --}}
                        <div class="flex mt-10 overflow-hidden lg:flex-none">
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
                    </div>
                    {{-- tambah data selesai --}}

                    {{-- table --}}
                    <div class="bg-white mt-10 py-5 px-5 shadow-md rounded-lg">
                        <table id="myTable" class="stripe display compact order-column" style="width:100%">
                            <thead align="center">
                                <tr>
                                    <th>No</th>
                                    <th>Umur</th>
                                    <th>Berat badan</th>
                                    <th>Panjang/Tinggi badan</th>
                                    <th>Lingkar kepala</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody align="center">
                                @foreach ($childs as $child)
                                    <tr align="center">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $child->age }}</td>
                                        <td>{{ $child->weight }} kg</td>
                                        <td>{{ $child->body_length }} cm</td>
                                        <td>{{ $child->head_circumference }} cm</td>
                                        <td align="center" class="flex">
                                            {{-- edit --}}
                                            <div class="mx-2">
                                                <a href="/user/manage-growth-edit/{{ $child->Id_growth }}"
                                                    class="text-center font-medium text-blue-600 dark:text-blue-500 cursor-pointer hover:underline">Ubah</a>
                                            </div>
                                            {{-- edit selesai --}}
                                        </td>
                                        <td>
                                            {{-- hapus --}}
                                            <div class="mx-2">
                                                <button data-modal-target="modal-delete-{{ $child->Id_growth }}"
                                                    data-modal-toggle="modal-delete-{{ $child->Id_growth }}"
                                                    class="text-center font-medium text-red-600 dark:text-blue-500 cursor-pointer hover:underline">Hapus</button>
                                            </div>
                                            {{-- hapus selesai --}}

                                        </td>
                                    </tr>

                                    {{-- modal validasi hapus --}}
                                    <div id="modal-delete-{{ $child->Id_growth }}" tabindex="-1"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full animated fadeIn faster">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button"
                                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="modal-delete-{{ $child->Id_growth }}">
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
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                    <h3
                                                        class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                        Are
                                                        you
                                                        Apakah anda yakin ingin menghapus data ini?</h3>
                                                    <form method="POST"
                                                        action="{{ route('user.manage.growth.delete', $child->Id_growth) }}">
                                                        @csrf @method('DELETE')
                                                        <button type="submit"
                                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                            Ya, saya yakin
                                                        </button>

                                                        <button data-modal-hide="modal-delete-{{ $child->Id_growth }}"
                                                            type="button"
                                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- modal validasi hapus --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- table selesai --}}
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- modal tambah -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Tambah Data
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
                <form id="growth-form" class="p-4 md:p-5" action="{{ route('user.manage.growth.proses') }}"
                    method="POST">
                    @csrf

                    <input type="hidden" value="{{ $id }}" name="child_id">
                    {{-- input berat --}}
                    <div class="col-span-2">
                        <label for="weight"
                            class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Berat Badan</label>
                        <div class="relative">
                            <div class="inset-y-0 start-0 ">
                                <input type="text" name="weight" id="weight"
                                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Masukkan berat badan">

                            </div>
                        </div>
                    </div>
                    {{-- input berat selesai --}}

                    {{-- eror berat --}}
                    <div id="alert-1" class="col-span-1 ml-2 mt-3" style="display: none;">
                        <div class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 text-sm font-medium" id="weight-error-message">
                            </div>
                        </div>
                    </div>
                    {{-- eror berat selesai --}}

                    {{-- input panjang --}}
                    <div class="col-span-2">
                        <label for="height"
                            class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Panjang/tinggi
                            Badan</label>
                        <div class="relative">
                            <div class="inset-y-0 start-0 ">
                                <input type="text" name="height" id="height"
                                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Masukkan panjang/tinggi badan">

                            </div>
                        </div>
                    </div>
                    {{-- input panjang selesai --}}

                    {{-- eror panjang --}}
                    <div id="alert-2" class="col-span-1 ml-2 mt-3" style="display: none;">
                        <div class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 text-sm font-medium" id="height-error-message">
                            </div>
                        </div>
                    </div>
                    {{-- eror panjang selesai --}}

                    {{-- input lingkar kepala --}}
                    <div class="col-span-2">
                        <label for="head"
                            class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Lingkar kepala</label>
                        <div class="relative">
                            <div class="inset-y-0 start-0 ">
                                <input type="text" name="head" id="head"
                                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Masukkan lingkar kepala">

                            </div>
                        </div>
                    </div>
                    {{-- input lingkar kepala selesai --}}

                    {{-- eror lingkar kepala --}}
                    <div id="alert-3" class="col-span-1 ml-2 mt-3" style="display: none;">
                        <div class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 text-sm font-medium" id="head-error-message">
                            </div>
                        </div>
                    </div>
                    {{-- eror lingkar kepala selesai --}}


                    <hr>

                    <button type="submit" id="submit-button"
                        class="text-white inline-flex mt-2 items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Tambah data
                    </button>
                </form>
            </div>
        </div>
    </div>
    {{-- modal tambah selesai --}}

    {{-- validation insert --}}
    <script>
        $(document).ready(function() {
            $("#growth-form").validate({
                rules: {
                    weight: {
                        required: true,
                        number: true
                    },
                    height: {
                        required: true,
                        number: true
                    },
                    head: {
                        required: true,
                        number: true
                    }
                },
                messages: {
                    weight: {
                        required: "Masukkan berat badan!",
                        number: "Masukkan angka tanpa huruf!"
                    },
                    height: {
                        required: "Masukkan tinggi/panjang badan!",
                        number: "Masukkan angka tanpa huruf!"
                    },
                    head: {
                        required: "Masukkan lingkar kepala!",
                        number: "Masukkan angka tanpa huruf!"
                    }
                },
                errorPlacement: function(error, element) {
                    if (element.attr("id") == "weight") {
                        $("#alert-1").show();
                        $("#weight-error-message").html(error.text());
                    } else if (element.attr("id") == "height") {
                        $("#alert-2").show();
                        $("#height-error-message").html(error.text());
                    } else if (element.attr("id") == "head") {
                        $("#alert-3").show();
                        $("#head-error-message").html(error.text());
                    }
                }
            });
        });
    </script>
    {{-- validation insert selesai --}}

    {{-- data table --}}
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                language: {
                    url: "{{ asset('js/id.json') }}",
                },
                columnDefs: [{
                    targets: -1,
                    className: 'dt-body-center'
                }]
            });
        });
    </script>
    {{-- data table selesai --}}
    @vite('resources/js/app.js')
</body>

</html>
