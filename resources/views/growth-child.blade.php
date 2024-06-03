<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LindungiSiKecil || Grafik Pertumbuhan Anak</title>
    <link rel="icon" href="{{ asset('image/logoLindungiSiKecil-removebg-preview2.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-red-300">

    @extends('layout.navbar')

    <div class="p-4 pt-[90px]">
        <div class="p-4 border-2 border-gray-200 border-dashed bg-neutral-50 shadow-lg rounded-lg">
            {{-- breadcrumb --}}
            <div class="container px-3 pt-3">
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

                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Grafik
                                    Pertumbuhan Anak</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="container px-2 pt-8">
                <h1 class="text-2xl font-sans font-bold text-gray-600 mb-6 lg:text-3xl">
                    <span class="underline underline-offset-3 decoration-8 decoration-red-400 dark:decoration-blue-600">
                        Grafik Pertumbuhan Anak
                    </span>
                </h1>
            </div>

            {{-- card anak --}}
            <div class="flex lg:flex-row">
                <div class=" flex px-2 pt-8 truncate ">
                    <div class="carousel overflow-x-auto hide-scrollbar scroll-smooth">
                        @forelse ($childs as $child_with_age)
                            <div class="carousel-item inline-block cursor-pointer">
                                <a data-child-id="{{ $child_with_age['id_child'] }}" class="mr-2">
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
            </div>

            <hr class="mt-8">

            <div class="container mx-auto ">
                <div class="py-[65px]">
                    @forelse ($childs as $child_with_age)
                        <div class="hidden" id="child-data-{{ $child_with_age['id_child'] }}">
                            <!-- display child data here -->
                            <h2>{{ $child_with_age['child']->name }}</h2>
                            <p>Age: {{ $child_with_age['age'] }}</p>
                            <!-- add more data as needed -->
                            <div class="p-10 bg-white rounded-lg">
                                <canvas id="myChart-{{ $child_with_age['id_child'] }}"></canvas>
                            </div>
                        </div>

                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- sidebar  --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cards = document.querySelectorAll('.carousel-item');
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

                    fetch(`/user/chart/${childId}`)
                        .then(response => response.json())
                        .then(data => {
                            // Create the chart using the received data
                            const name = data.name;
                            const ctx = document.getElementById(`myChart-${childId}`)
                                .getContext('2d');
                            const DATA_COUNT = 17; // 12 bulan + 12 tahun
                            const labels = [];
                            for (let i = 0; i < DATA_COUNT; ++i) {
                                if (i < 12) {
                                    labels.push(i.toString() + ' bulan');
                                } else {
                                    labels.push((i - 11).toString() + ' tahun');
                                }
                            }
                            const datapoints = [{
                                    max: 0,
                                    current: 0,
                                    min: 0
                                },
                                {
                                    max: 12,
                                    current: 9,
                                    min: 7.7
                                },
                                {
                                    max: 15.3,
                                    current: 12,
                                    min: 9.7
                                },
                                {
                                    max: 60,
                                    current: 40,
                                    min: 20
                                },
                                {
                                    max: 60,
                                    current: 50,
                                    min: 30
                                },
                                {
                                    max: 120,
                                    current: 100,
                                    min: 80
                                },
                                {
                                    max: 120,
                                    current: 100,
                                    min: 80
                                },
                                {
                                    max: 120,
                                    current: 100,
                                    min: 80
                                },
                                {
                                    max: 120,
                                    current: 100,
                                    min: 80
                                },
                                {
                                    max: 120,
                                    current: 100,
                                    min: 80
                                },
                                {
                                    max: 120,
                                    current: 100,
                                    min: 80
                                },
                                {
                                    max: 120,
                                    current: 100,
                                    min: 80
                                },
                                {
                                    max: 120,
                                    current: 100,
                                    min: 80
                                }
                            ];
                            const chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: labels,
                                    datasets: [{
                                            label: 'Maksimal berat badan anak(kg)',
                                            data: datapoints.map(dp => dp.max),
                                            borderColor: '#ff0000',
                                            fill: false,
                                            tension: 0.4, // Set the tension property
                                        },
                                        {
                                            label: 'Berat badan' + name,
                                            data: datapoints.map(dp => dp
                                                .current),
                                            borderColor: '#31C48D',
                                            fill: false,
                                            tension: 0.4, // Set the tension property
                                        },
                                        {
                                            label: 'Minimal berat badan anak(kg)',
                                            data: datapoints.map(dp => dp.min),
                                            borderColor: '#FACA15',
                                            fill: false,
                                        }
                                    ],
                                },
                                options: {
                                    responsive: true,
                                    plugins: {
                                        title: {
                                            display: true,
                                            text: 'Berat badan',
                                        },
                                    },
                                    interaction: {
                                        intersect: false,
                                    },
                                    scales: {
                                        x: {
                                            display: true,
                                            title: {
                                                display: true,
                                                text: 'Umur',
                                            },
                                            // Add a grid line at the 12th month mark
                                            gridLines: {
                                                drawBorder: true,
                                                drawTicks: true, // Hide the tick mark at the grid line
                                                lineWidth: 2,
                                                color: 'rgba(0, 0, 0, 0.3)', // Set the grid line color
                                                zeroLineLocation: 12, // Define the location of the grid line at 12th month
                                            },
                                            afterBody: function(context) {
                                                const chart = context.chart;
                                                const xValue = 12;
                                                const xPixel = chart
                                                    .getPixelForValue(xValue,
                                                        0);
                                                context.lineWidth = 2;
                                                context.strokeStyle =
                                                    'rgba(0, 0, 0, 0.3)';
                                                context.beginPath();
                                                context.moveTo(xPixel, chart
                                                    .chartArea.top);
                                                context.lineTo(xPixel, chart
                                                    .chartArea.bottom);
                                                context.stroke();
                                            }
                                        },
                                        y: {
                                            display: true,
                                            title: {
                                                display: true,
                                                text: 'Berat badan (kg)',
                                            },
                                            suggestedMin: 10,
                                            suggestedMax: 100,
                                        },
                                    },
                                },
                            });
                        });
                })
            });
        });
    </script>


    @vite('resources/js/app.js')
</body>

</html>
