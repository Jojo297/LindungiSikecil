<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LindungiSiKecil || Profile</title>
    <link rel="icon" href="{{ asset('image/logoLindungiSiKecil-removebg-preview2.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
</head>

<body class="bg-red-300">
    {{-- navbar --}}
    @extends('layout.navbar')
    {{-- navbar selesai --}}

    <div class="p-4 pt-[90px]">
        <div class="p-4 border-2 border-gray-200 border-dashed bg-neutral-50 rounded-lg h-screen">
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
                                <a href="/user/profile"
                                    class="ms-1 text-sm font-medium text-gray-700 hover:text-red-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Profile</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Ubah
                                    Profile</span>
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
                class="container mx-auto border-2 border-red-300 border-dashed bg-white p-4 overflow-x-auto shadow-sm rounded-lg pt-3 lg:w-3/4">
                <div class="flex justify-center">
                    <h1 class="text-xl font-sans font-bold text-gray-700 mb-2 mt-3 lg:text-xl">Ubah Profile</h1>
                </div>
                <form action="{{ route('user.update.profile') }}" id="profile-form" method="POST" class="lg:p-8">
                    @method('PUT') @csrf
                    {{-- input nama --}}
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-700 dark:text-white">Nama</label>
                    <input type="text" id="name" name="name" aria-describedby="helper-text-explanation"
                        maxlength="25"
                        class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        value="{{ Auth::user()->username }}">
                    {{-- input nama selesai --}}

                    {{-- eror name --}}
                    <div id="alert-1"
                        class="flex col-span-2 items-center p-4 mt-3 mb-3 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 "
                        role="alert" style="display: none;">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium" id="name-error-message">
                        </div>
                    </div>
                    {{-- eror name selesai --}}

                    {{-- input email --}}
                    <label for="email"
                        class="block mb-2 mt-4 text-sm font-medium text-gray-700 dark:text-white">Email</label>
                    <input type="text" id="email" name="email" maxlength="25"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        value="{{ Auth::user()->email }}">
                    {{-- input email selesai --}}

                    {{-- eror email --}}
                    <div id="alert-2"
                        class="flex col-span-2 items-center p-4 mt-3 mb-3 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 "
                        role="alert" style="display: none;">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium" id="email-error-message">
                        </div>

                    </div>
                    {{-- eror name email --}}

                    {{-- input wa --}}
                    <label for="noWa" class="block mb-2 mt-4 text-sm font-medium text-gray-700 dark:text-white">No
                        Whatsapp</label>
                    <div class="flex items-center">
                        <input type="text" id="noWa" name="noWa" maxlength="15"
                            aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border-gray-300 text-gray-700 text-sm rounded-lg block w-full p-2.5 "
                            value="{{ $decryptNoWa }}">

                    </div>
                    {{-- input wa selesai --}}

                    {{-- eror wa --}}
                    <div id="alert-3"
                        class="flex col-span-2 items-center p-4 mt-3 mb-3 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 "
                        role="alert" style="display: none;">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium" id="wa-error-message">
                        </div>
                    </div>
                    {{-- eror wa selesai --}}

                    <div class="flex justify-center gap-2 mt-3 ">
                        <button type="submit" id="submit-button"
                            class="text-white flex mt-2 items-center bg-blue-700 animate transition duration-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-1/2 justify-center lg:w-1/3">
                            Simpan
                        </button>

                    </div>
                </form>
            </div>
            {{-- data user selesai --}}

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#profile-form").validate({
                rules: {
                    name: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    noWa: {
                        required: true,
                        number: true
                    }
                },
                messages: {
                    name: "Masukkan nama anda!",
                    email: {
                        required: "Masukkan email anda!",
                        email: "Masukkan email dengan benar!"
                    },
                    noWa: {
                        required: "Masukkan nomer whatsaap anda!",
                        number: "Masukkan angka!"
                    }
                },
                errorPlacement: function(error, element) {
                    if (element.attr("id") == "name") {
                        $("#alert-1").show();
                        $("#name-error-message").html(error.text());
                    } else if (element.attr("id") == "email") {
                        $("#alert-2").show();
                        $("#email-error-message").html(error.text());
                    } else if (element.attr("id") == "noWa") {
                        $("#alert-3").show();
                        $("#wa-error-message").html(error.text());
                    }
                }
            });
        });
    </script>
    @vite('resources/js/app.js')
</body>

</html>
