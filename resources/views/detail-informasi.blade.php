<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informasi Vaksin || {{ $detail->heading }}</title>
    <link rel="icon" href="{{ asset('image/logoLindungiSiKecil-removebg-preview2.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* CSS untuk menargetkan link dalam artikel */
        .article-content a {
            color: blue;

        }

        /* Pastikan CSS khusus tidak menimpa gaya default untuk list */
        .article-content ol {
            list-style-type: decimal;
            /* Pastikan list-style-type diatur ke decimal */
            margin-left: 20px;
            /* Tambahkan margin jika diperlukan untuk indentasi */
        }
    </style>
</head>

<body class="bg-red-300">

    {{-- sidebar --}}
    @extends('layout.navbar')
    {{-- sidebar selesai --}}
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
                                <a href="/user/information-vaccine"
                                    class="ms-1 text-sm font-medium text-gray-700 hover:text-red-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Informasi
                                    Vaksin</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span
                                    class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $detail->heading }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="container mx-auto px-4 pt-8">
                <h1
                    class="text-2xl font-sans font-bold text-gray-600 mb-6 underline underline-offset-3 decoration-8 decoration-red-400 dark:decoration-blue-600 lg:text-3xl">
                    {{ $detail->heading }}
                </h1>
            </div>
            <div class="container px-4 pt-5">
                <div class="bg-red-50 p-4 rounded-lg">
                    <article class="text-wrap article-content">
                        <p class="text-justify whitespace-break-spaces text-gray-700">{!! $detail->body !!}</p>
                    </article>
                </div>
            </div>
        </div>
    </div>
    @vite('resources/js/app.js')
</body>

</html>
