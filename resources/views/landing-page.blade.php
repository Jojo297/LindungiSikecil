<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('image/logoLindungiSiKecil-removebg-preview2.png') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body class="">
    {{-- navbar --}}
    <nav
        class="bg-neutral-50 fixed top-0 z-30 w-full border-b-2 border-gray-200 rounded-br-lg rounded-bl-lg dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('user.dashboard') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('image/logoLindungiSiKecil-removebg-preview2.png') }}" class="h-14"
                    alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap">LindungiSiKecil</span>
            </a>

            <div class="hidden flex-row-reverse md:flex lg:flex">
                <a href="#team" class="text-slate-800 hover:text-red-500 duration-300 font-medium px-3">Tim</a>
                <a href="#feature" class="text-slate-800 hover:text-red-500 duration-300 font-medium px-3">Fitur</a>
                <a href="#about" class="text-slate-800 hover:text-red-500 duration-300 font-medium px-3">Tentang</a>
                <a href="#home" class="text-slate-800 hover:text-red-500 duration-300 font-medium px-3">Beranda</a>
            </div>

            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

                <div class="justify-between">
                    <a href="{{ route('login') }}"
                        class="relative items-center justify-center p-0.5 mr-3 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group hidden lg:inline-flex">
                        Masuk</a>

                    <a href="/daftar"
                        class="relative inline-flex items-center justify-center p-0.5  overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
                        <span
                            class="relative px-5 py-2.5 transition-all ease-in duration-300 bg-neutral-50 dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">Daftar</span></a>
                </div>
                {{-- button humburger --}}
                <button data-collapse-toggle="navbar-hamburger" type="button"
                    class="inline-flex items-center justify-center p-2 w-10 h-10 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 md:hidden lg:hidden dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-hamburger" aria-expanded="false" onclick="toggleNavbar()">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Dropdown menu -->
        <div class="p-1">
            <div class="hidden fixed top-0 z-10 w-full mt-[90px] md:hidden lg:hidden" id="navbar-hamburger">
                <ul
                    class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 transition duration-300 ease-in-out dark:bg-gray-800 dark:border-gray-700">
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-red-500 hover:text-white dark:bg-blue-600"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-red-500 hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Services</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-red-500 hover:text-white dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white">Pricing</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-red-500 hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- navbar selesai --}}

    {{-- jumbotron --}}
    <!-- component -->
    <section id="home" class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 pt-[10rem] md:flex-row flex-col items-center">
            <div
                class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Yuk, Lindungi Si Kecil dengan
                    <br class="hidden lg:inline-block"><span
                        class="inline-block border-b-8 border-g4 bg-white px-4 font-bold text-g4 animate__animated animate__flash">imunisasi</span>

                </h1>
                <p class="mb-8 leading-relaxed">Bantu Anak Tumbuh Sehat, Imunisasi Jangan Dilewatkan!
                    Kasih
                    Sayang Ibu Terlihat dari Kepeduliannya Terhadap Imunisasi Anak.</p>
                <div class="flex justify-center">
                    <a href="/daftar"
                        class="inline-flex text-white bg-red-500 font-medium border-0 py-2 px-6 focus:outline-none cursor-pointer transition duration-300 hover:bg-red-600 rounded text-lg">Ayo
                        Mulai!</a>
                    <a href="#about"
                        class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none cursor-pointer hover:bg-gray-200 duration-300 rounded text-lg">Lihat
                        selengkapnya</a>
                </div>
            </div>
            <div class="relative lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                {{-- Gambar weew.png yang berada di belakang --}}
                <img class="absolute inset-0 object-cover object-center rounded z-10" alt="background"
                    src="{{ asset('image/Desain_tanpa_judul-removebg-preview.png') }}">
                {{-- Gambar jumbotron.png yang berada di depan --}}
                <img class="relative object-cover object-center rounded z-20" alt="hero"
                    src="{{ asset('image/jumbotron-removebg-preview.png') }}">
            </div>

        </div>
    </section>
    {{-- jumbotron selesai --}}

    {{-- about --}}
    <section id="about" class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mt-5 mb-10">
                <h2 class="text-xs text-red-500 tracking-widest font-medium title-font mb-1">About</h2>
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Tentang Kami</h1>
            </div>
            <div class="w-full mx-auto text-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    class="inline-block w-8 h-8 text-gray-400 mb-8" viewBox="0 0 975.036 975.036">
                    <path
                        d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z">
                    </path>
                </svg>
                <div class="bg-gray-50 p-6 w-full rounded-lg">
                    {{-- <blockquote class="p-4 my-4 border-s-4 border-gray-300 bg-gray-50 "> --}}
                    <p class="leading-relaxed text-lg">Orang tua seringkali mengalami kesulitan dalam memantau
                        jadwal imunisasi anak dan perkembangan fisiknya secara teratur. Kekurangan informasi yang
                        jelas dan tepat mengenai jenis vaksin serta manfaatnya juga menjadi tantangan. Selain itu,
                        pencatatan manual riwayat imunisasi anak dapat menyebabkan ketidakakuratan dan kesulitan
                        dalam mengakses informasi yang diperlukan. <strong
                            class="underline decoration-pink-500">LindungiSiKecil</strong> dirancang untuk
                        mengatasi
                        masalah-masalah tersebut dengan menyediakan solusi yang terintegrasi dan mudah diakses. </p>
                    </blockquote>
                    <span class="inline-block h-1 w-10 rounded bg-red-500 mt-8 mb-6"></span>

                </div>
            </div>
        </div>
    </section>

    {{-- about selesai --}}

    {{-- features --}}
    <section id="feature" class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-wrap">
            <div class="flex flex-col text-center w-full mb-20">
                <h2 class="text-xs text-red-500 tracking-widest font-medium title-font mb-1">Feature</h2>
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Fitur Utama Kami</h1>
            </div>

            <div class="lg:w-1/2 w-full mb-10 lg:mb-0 rounded-lg overflow-hidden">
                {{-- <img alt="feature" class="object-cover object-center h-full w-full"
                    src="https://dummyimage.com/460x500"> --}}
                <div
                    class="relative mx-auto border-gray-800 dark:border-gray-800 bg-gray-800 border-[14px] rounded-[2.5rem] h-[600px] w-[300px]">
                    <div
                        class="h-[32px] w-[3px] bg-gray-800 dark:bg-gray-800 absolute -start-[17px] top-[72px] rounded-s-lg">
                    </div>
                    <div
                        class="h-[46px] w-[3px] bg-gray-800 dark:bg-gray-800 absolute -start-[17px] top-[124px] rounded-s-lg">
                    </div>
                    <div
                        class="h-[46px] w-[3px] bg-gray-800 dark:bg-gray-800 absolute -start-[17px] top-[178px] rounded-s-lg">
                    </div>
                    <div
                        class="h-[64px] w-[3px] bg-gray-800 dark:bg-gray-800 absolute -end-[17px] top-[142px] rounded-e-lg">
                    </div>
                    <div class="rounded-[2rem] overflow-hidden w-[272px] h-[572px] bg-white dark:bg-gray-800">
                        <img src="{{ asset('image/mockup_notif.jpg') }}" class="dark:hidden w-[272px] h-[572px]"
                            alt="Light mockup">
                    </div>
                </div>
            </div>

            <div class="flex flex-col flex-wrap lg:py-6 -mb-10 lg:w-1/2 lg:pl-12 lg:text-left text-center">
                <div class="flex flex-col mb-10 lg:items-start items-center">
                    <div
                        class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-red-100 text-indigo-500 mb-5">
                        <svg class="w-6 h-6 text-red-500 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 5.365V3m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175 0 .593 0 1.193-.538 1.193H5.538c-.538 0-.538-.6-.538-1.193 0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 12 5.365Zm-8.134 5.368a8.458 8.458 0 0 1 2.252-5.714m14.016 5.714a8.458 8.458 0 0 0-2.252-5.714M8.54 17.901a3.48 3.48 0 0 0 6.92 0H8.54Z" />
                        </svg>

                    </div>
                    <div class="flex-grow">
                        <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Mengirim Notifikasi Jadwal
                            Imunisasi Ke WhatsApp</h2>
                        <p class="mb-5 leading-relaxed text-base">dirancang untuk membantu orang tua mengingatkan
                            jadwal
                            imunisasi anak mereka dengan lebih efektif dan efisien. Melalui integrasi dengan WhatsApp,
                            fitur ini secara otomatis mengirimkan pemberitahuan kepada orang tua tentang jadwal
                            imunisasi yang akan datang, termasuk notifikasi pada hari H dan pengingat tiga hari
                            sebelumnya.
                        </p>
                        <p>
                            Dengan demikian, orang tua dapat memastikan anak mereka mendapatkan imunisasi
                            tepat waktu, yang penting untuk kesehatan dan perkembangan mereka. Fitur ini tidak hanya
                            memberikan kenyamanan tetapi juga meningkatkan kepedulian dan tanggung jawab dalam menjaga
                            kesehatan anak-anak.</p>
                        <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">

                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Fitur Kami Lainnya</h1>
            </div>
            <div class="flex flex-wrap -m-4">
                <div class="p-4 md:w-1/3">
                    <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
                        <div class="flex items-center mb-3">
                            <div
                                class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-red-100 text-white flex-shrink-0">
                                <svg class="w-6 h-6 text-red-500 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
                                </svg>

                            </div>
                            <h2 class="text-gray-900 text-lg title-font font-medium">Jadwal Imunisasi</h2>
                        </div>
                        <div class="flex-grow">
                            <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four
                                dollar toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
                            <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2"
                                    viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-4 md:w-1/3">
                    <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
                        <div class="flex items-center mb-3">
                            <div
                                class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-red-100 text-white flex-shrink-0">
                                <svg class="w-6 h-6 text-red-500 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 4.5V19a1 1 0 0 0 1 1h15M7 14l4-4 4 4 5-5m0 0h-3.207M20 9v3.207" />
                                </svg>

                            </div>
                            <h2 class="text-gray-900 text-lg title-font font-medium">Grafik Pertumbuhan Anak</h2>
                        </div>
                        <div class="flex-grow">
                            <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four
                                dollar toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
                            <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2"
                                    viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-4 md:w-1/3">
                    <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
                        <div class="flex items-center mb-3">
                            <div
                                class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-red-100 text-white flex-shrink-0">
                                <svg class="w-6 h-6 text-red-500 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                </svg>

                            </div>
                            <h2 class="text-gray-900 text-lg title-font font-medium">Informasi Vaksin</h2>
                        </div>
                        <div class="flex-grow">
                            <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four
                                dollar toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
                            <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2"
                                    viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- features selesai --}}

    {{-- team --}}
    <section id="team" class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-10">
                <h2 class="text-xs text-red-500 tracking-widest font-medium title-font mb-1">Our Team</h2>
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Tim Kami</h1>
            </div>
            <div class="flex flex-wrap -m-2">
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                        <img alt="team"
                            class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                            src="{{ asset('image/WhatsApp Image 2024-04-10 at 14.36.32_8910d115.jpg') }}">
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">M Afiffudin Al Mahdi</h2>
                        </div>
                    </div>
                </div>
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                        <img alt="team"
                            class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                            src="{{ asset('image/ali.jpg') }}">
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">Muhammad Al Ghazali</h2>
                        </div>
                    </div>
                </div>
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                        <img alt="team"
                            class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                            src="{{ asset('image/amel.jpg') }}">
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">Amelia Hanif</h2>
                        </div>
                    </div>
                </div>
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                        <img alt="team"
                            class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                            src="https://dummyimage.com/90x90">
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">Nurul Aini</h2>
                        </div>
                    </div>
                </div>
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                        <img alt="team"
                            class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                            src="{{ asset('image/nopri.jpg') }}">
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">Nofri Fahsyuliardi</h2>
                        </div>
                    </div>
                </div>
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                        <img alt="team"
                            class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                            src="https://dummyimage.com/98x98">
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">Mira Handayani</h2>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>

    {{-- team selesai --}}

    {{-- footer --}}
    <footer class="text-gray-600 body-font">
        <div
            class="container px-5 py-24 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
            <div class="w-64 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left">
                <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                    <img src="{{ asset('image/logoLindungiSiKecil-removebg-preview2.png') }}" class="w-10 h-10"
                        alt="" srcset="">
                    <span class="ml-3 text-xl">LindungiSiKecil</span>
                </a>
                <p class="mt-2 text-sm text-gray-500">Air plant banjo lyft occupy retro adaptogen indego</p>
            </div>
            <div class="flex-grow flex flex-wrap md:pl-20 -mb-10 md:mt-0 mt-10 md:text-left text-center">
                <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                    <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">CATEGORIES</h2>
                    <nav class="list-none mb-10">
                        <li>
                            <a class="text-gray-600 hover:text-gray-800">First Link</a>
                        </li>
                        <li>
                            <a class="text-gray-600 hover:text-gray-800">Second Link</a>
                        </li>
                        <li>
                            <a class="text-gray-600 hover:text-gray-800">Third Link</a>
                        </li>
                        <li>
                            <a class="text-gray-600 hover:text-gray-800">Fourth Link</a>
                        </li>
                    </nav>
                </div>
                <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                    <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">CATEGORIES</h2>
                    <nav class="list-none mb-10">
                        <li>
                            <a class="text-gray-600 hover:text-gray-800">First Link</a>
                        </li>
                        <li>
                            <a class="text-gray-600 hover:text-gray-800">Second Link</a>
                        </li>
                        <li>
                            <a class="text-gray-600 hover:text-gray-800">Third Link</a>
                        </li>
                        <li>
                            <a class="text-gray-600 hover:text-gray-800">Fourth Link</a>
                        </li>
                    </nav>
                </div>
                <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                    <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">CATEGORIES</h2>
                    <nav class="list-none mb-10">
                        <li>
                            <a class="text-gray-600 hover:text-gray-800">First Link</a>
                        </li>
                        <li>
                            <a class="text-gray-600 hover:text-gray-800">Second Link</a>
                        </li>
                        <li>
                            <a class="text-gray-600 hover:text-gray-800">Third Link</a>
                        </li>
                        <li>
                            <a class="text-gray-600 hover:text-gray-800">Fourth Link</a>
                        </li>
                    </nav>
                </div>
                <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                    <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">CATEGORIES</h2>
                    <nav class="list-none mb-10">
                        <li>
                            <a class="text-gray-600 hover:text-gray-800">First Link</a>
                        </li>
                        <li>
                            <a class="text-gray-600 hover:text-gray-800">Second Link</a>
                        </li>
                        <li>
                            <a class="text-gray-600 hover:text-gray-800">Third Link</a>
                        </li>
                        <li>
                            <a class="text-gray-600 hover:text-gray-800">Fourth Link</a>
                        </li>
                    </nav>
                </div>
            </div>
        </div>
        <div class="bg-gray-100">
            <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row">
                <p class="text-gray-500 text-sm text-center sm:text-left">© 2020 Tailblocks —
                    <a href="https://twitter.com/knyttneve" rel="noopener noreferrer" class="text-gray-600 ml-1"
                        target="_blank">@knyttneve</a>
                </p>
                <span class="inline-flex sm:ml-auto sm:mt-0 mt-2 justify-center sm:justify-start">
                    <a class="text-gray-500">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            class="w-5 h-5" viewBox="0 0 24 24">
                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                        </svg>
                    </a>
                    <a class="ml-3 text-gray-500">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            class="w-5 h-5" viewBox="0 0 24 24">
                            <path
                                d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                            </path>
                        </svg>
                    </a>
                    <a class="ml-3 text-gray-500">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                        </svg>
                    </a>
                    <a class="ml-3 text-gray-500">
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                            <path stroke="none"
                                d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                            </path>
                            <circle cx="4" cy="4" r="2" stroke="none"></circle>
                        </svg>
                    </a>
                </span>
            </div>
        </div>
    </footer>
    {{-- footer selesai --}}

    @vite('resources/js/app.js')
    <script>
        let isNavbarOpen = true;

        function toggleNavbar() {
            const navbarHamburger = document.getElementById('navbar-hamburger');

            if (isNavbarOpen) {
                navbarHamburger.classList.add('show');
                navbarHamburger.classList.remove('hide');
                isNavbarOpen = true;
            } else {
                navbarHamburger.classList.add('hide');
                navbarHamburger.classList.remove('show');
                isNavbarOpen = false;
            }
        }
    </script>

</body>

</html>
