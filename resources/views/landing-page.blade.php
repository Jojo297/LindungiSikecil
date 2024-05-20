<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
    {{-- navbar --}}
    <nav
        class="bg-neutral-50 fixed top-0 z-20 w-full border-b-2 border-gray-200 rounded-br-lg rounded-bl-lg dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('user.dashboard') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('image/logoLindungiSiKecil-removebg-preview2.png') }}" class="h-14"
                    alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap">LindungiSiKecil</span>
            </a>
            <div class="hidden flex-row-reverse md:flex lg:flex">
                <a href="" class="text-slate-800 font-medium px-3">Beranda</a>
                <a href="" class="text-slate-800 font-medium px-3">Beranda</a>
                <a href="" class="text-slate-800 font-medium px-3">Beranda</a>
            </div>
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                {{-- button --}}
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
    <div class="flex items-center justify-center overflow-hidden  ">
        <div
            class="relative mx-auto h-full px-4 pt-[40px] pb-20 md:pb-10 sm:max-w-xl md:max-w-full md:px-24 lg:max-w-screen-xl lg:px-8">
            <div class="flex flex-col items-center justify-between lg:flex-row py-16">
                <div class=" relative ">
                    <div class="lg:max-w-xl lg:pr-5 relative">
                        <h2
                            class="mb-6 max-w-lg text-5xl font-light leading-snug tracking-tight text-g1 sm:text-7xl sm:leading-snug">
                            We make you look
                            <span
                                class="my-1 inline-block border-b-8 border-g4 bg-white px-4 font-bold text-g4 animate__animated animate__flash">different</span>
                        </h2>
                        <p class="text-base text-gray-700">Sed ut perspiciatis unde omnis iste natus error sit
                            voluptatem
                            accusantium doloremque it.</p>
                        <div class="mt-10 flex flex-col items-center md:flex-row">
                            <a href="/"
                                class="mb-3 inline-flex h-12 w-full items-center justify-center rounded bg-green-600 px-6 font-medium tracking-wide text-white shadow-md transition hover:bg-blue-800 focus:outline-none md:mr-4 md:mb-0 md:w-auto">
                                View More</a>
                            <a href="/" aria-label=""
                                class="group inline-flex items-center font-semibold text-g1">Watch how
                                it works
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="ml-4 h-6 w-6 transition-transform group-hover:translate-x-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>


                </div>
                <div class="relative pt-[20px] hidden lg:ml-32 lg:block lg:w-1/2">

                    <div
                        class="abg-orange-400 mx-auto w-fit overflow-hidden rounded-[6rem] rounded-br-none rounded-tl-none">
                        <img src="{{ asset('image/logoLindungiSiKecil-removebg-preview2.png') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden text-9xl varien absolute top-6 left-1/4 text-g/10 z-40    ">
            About Us
        </div>




    </div>
    {{-- jumbotron selesai --}}


    @vite('resources/js/app,js')
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
