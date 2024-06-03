<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LindungiSiKecil || Dashboard</title>
    <link rel="icon" href="{{ asset('image/logoLindungiSiKecil-removebg-preview2.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
</head>

<body class="bg-red-300">

    @extends('layout.navbar')

    <div class="p-4 pt-[90px]">
        <div class="p-4 border-2 border-gray-200 border-dashed bg-neutral-50 shadow-lg rounded-lg">
            <div class="container pt-3">
                {{-- breadcrumb --}}
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <div class="inline-flex items-center text-sm font-medium text-gray-500 md:ms-2">
                                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                </svg>
                                Dashboard
                            </div>
                        </li>


                    </ol>
                </nav>
            </div>
            <div class="container px-2 pt-8">
                <h1 class="text-2xl font-sans font-bold text-gray-600 mb-6 lg:text-3xl">Selamat Datang,
                    <span class="underline underline-offset-3 decoration-8 decoration-red-400 dark:decoration-blue-600">

                        {{ Auth::user()->username }}🤞
                    </span>
                </h1>
            </div>

            {{-- card anak --}}
            <div class="flex lg:flex-row">
                <div class=" flex px-2 pt-8 truncate ">
                    <div class="carousel overflow-x-auto hide-scrollbar scroll-smooth">
                        @forelse ($childs as $child_with_age)
                            <div class="carousel-item inline-block">
                                <a href="/user/child-profile/{{ $child_with_age['id_child'] }}" class="mr-2">
                                    <div
                                        class="w-52 max-w-sm px-4 py-3 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 md:w-64 lg:w-72 overflow-hidden">

                                        <div class="flex items-center ">
                                            <img class="mb-3 rounded-full shadow-md" src="{{ asset('image/man.png') }}"
                                                alt="Bonnie image" width="50" />
                                            <div class=" px-2">
                                                <p
                                                    class="text-ellipsis mb-1 text-xl font-medium text-gray-900 dark:text-white">
                                                    {{ $child_with_age['child']->name }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex ">
                                            <span
                                                class="text-sm text-gray-500 dark:text-gray-400">{{ $child_with_age['age'] }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
                {{-- card anak selesai --}}


                {{-- card tambah anak --}}
                <div class="px-2 pt-8  lg:flex-none">
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
                                    Tambahkan Anak
                                </p>
                            </div>
                        </div>
                    </button>
                </div>
                {{-- card tambah anak selesai --}}
            </div>


            <hr class="mt-8">

            <div class="container mx-auto ">
                <div class="py-[65px]">
                    <div class="flex flex-wrap justify-items-center">
                        {{-- kelola jadwal imunisasi --}}
                        <div class="w-full md:w-1/2 lg:w-1/3">
                            <a href="{{ route('user.schedule') }}"
                                class="z-0 group block max-w-xs mx-auto rounded-lg p-6 mb-8 bg-white ring-1 ring-slate-900/5 shadow-md space-y-3 transition hover:bg-red-400 duration-500 hover:ring-red-400">
                                <div class="space-x-3">
                                    <div class="text-center">
                                        <h5 align="center"
                                            class="mb-2 text-2xl text-center font-sans font-semibold tracking-tight text-gray-600 transition group-hover:text-white duration-500 dark:text-white">
                                            Jadwal
                                            Imunisasi</h5>
                                    </div>
                                </div>
                                <img src="{{ asset('image/calendar_clock_schedule.png') }}" class=" w-full"
                                    alt="" />
                            </a>
                        </div>


                        {{-- kelola infomasi vaksin --}}
                        <div class="w-full md:w-1/2 lg:w-1/3">
                            <a href="{{ route('user.information-vaccine') }}"
                                class="group block max-w-xs mx-auto rounded-lg p-6 mb-8 bg-white ring-1 ring-slate-900/5 shadow-md space-y-3 transition hover:bg-red-400 duration-500 hover:ring-red-400">
                                <div class="space-x-3">
                                    <div class="text-center">
                                        <h5 align="center"
                                            class="text-center mb-2 text-2xl font-semibold tracking-tight text-gray-600  transition group-hover:text-white duration-500  dark:text-white">
                                            Informasi Vaksin</h5>
                                    </div>
                                </div>
                                <img src="{{ asset('image/informasi-vaksin.png') }}" class="w-full" alt="" />
                            </a>
                        </div>

                        {{-- kelola grafik pertumbuhan anak --}}
                        <div class="w-full md:w-full lg:w-1/3">
                            <a href="{{ route('user.growth.chart') }}"
                                class="group block max-w-xs mx-auto rounded-lg p-6 bg-white ring-1 ring-slate-900/5 shadow-md space-y-3 transition hover:bg-red-400 duration-500 hover:ring-red-400">
                                <div class="space-x-3">
                                    <div class="text-center">
                                        <h5 align="center"
                                            class="text-center mb-2 text-2xl font-semibold tracking-tight text-gray-600  transition group-hover:text-white duration-500  dark:text-white">
                                            Grafik Pertumbuhan anak</h5>
                                    </div>
                                </div>
                                <img src="{{ asset('image/graph.png') }}" class=" w-full" alt="" />
                            </a>
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
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Tambah Data Anak
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="crud-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form id="child-form" class="p-4 md:p-5" action="{{ route('user.add.child') }}"
                            method="POST">
                            @csrf
                            <div class="grid mb-4 grid-cols-2">
                                {{-- input nama --}}
                                <div class="col-span-2">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                        Anak:</label>
                                    <input type="text" name="name" id="name" autocomplete="off"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Masukkan nama anak anda">
                                </div>
                                {{-- input nama selesai --}}

                                {{-- eror name --}}
                                <div id="alert-1"
                                    class="flex col-span-2 items-center p-4 mt-3 mb-3 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 "
                                    role="alert" style="display: none;">
                                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div class="ms-3 text-sm font-medium" id="name-error-message">
                                    </div>

                                </div>
                                {{-- eror name selesai --}}

                                {{-- input tanggal lahir --}}
                                <div class="col-span-2 mt-3">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Lahir:</label>
                                    <div class="relative max-w-sm">
                                        <div
                                            class="flex items-center absolute inset-y-0 start-0 ps-3.5 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input datepicker datepicker-format="yyyy/mm/dd" id="date"
                                            name="date" type="text"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukkan tanggal lahir">
                                    </div>
                                </div>
                                {{-- input tanggal lahir selesai --}}

                                {{-- eror date --}}
                                <div id="alert-2"
                                    class="flex col-span-2 items-center p-4 mt-3 mb-3 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 "
                                    role="alert" style="display: none;">
                                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div class="ms-3 text-sm font-medium" id="date-error-message">
                                    </div>
                                </div>
                                {{-- eror date selesai --}}

                                {{-- input gender --}}
                                <div class="col-span-2 mt-3">
                                    <label for="gender"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                        Kelamin:</label>
                                    <div class="ml-3">
                                        <div class="flex items-center mb-4 mt-3">
                                            <input type="radio" value="laki-laki" name="gender" id="gender-1"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="gender-1"
                                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki-laki</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" value="perempuan" name="gender" id="gender-2"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="gender-2"
                                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                {{-- input gender selesai --}}

                                {{-- eror gender --}}
                                <div id="alert-3"
                                    class="flex col-span-2 items-center p-4 mt-3 mb-3 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 "
                                    role="alert" style="display: none;">
                                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div class="ms-3 text-sm font-medium" id="gender-error-message">
                                    </div>
                                </div>
                                {{-- eror gender selesai --}}
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
                                Tambah data anak
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            {{-- modal tambah selesai --}}
        </div>
    </div>
    </div>
    {{-- sidebar  --}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#child-form").validate({
                rules: {
                    name: "required",
                    date: {
                        required: true,
                        date: true
                    },
                    gender: "required"
                },
                messages: {
                    name: "Masukkan nama anak anda!",
                    date: {
                        required: "Masukkan tanggal lahir anak anda!",
                        date: "Masukkan tanggal lahir anak dengan benar!"
                    },
                    gender: "Pilih jenis kelamin anak anda!"
                },
                errorPlacement: function(error, element) {
                    if (element.attr("id") == "name") {
                        $("#alert-1").show();
                        $("#name-error-message").html(error.text());
                    } else if (element.attr("id") == "date") {
                        $("#alert-2").show();
                        $("#date-error-message").html(error.text());
                    } else if (element.attr("id") == "gender-1" || element.attr("id") == "gender-2") {
                        $("#alert-3").show();
                        $("#gender-error-message").html(error.text());
                    }
                }
            });
        });
    </script>
    @vite('resources/js/app.js')
</body>

</html>
