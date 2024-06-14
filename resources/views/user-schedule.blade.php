<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LindungiSiKecil || Jadwal Imunisasi</title>
    <link rel="icon" href="{{ asset('image/logoLindungiSiKecil-removebg-preview2.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.13/index.global.min.js'></script>
    <script src='fullcalendar/core/index.global.js'></script>
    <script src='fullcalendar/core/locales-all.global.js'></script>
    <script>
        // menampilkan jadwal imunisasi
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'id',
                initialView: 'dayGridMonth',
                eventClick: function(info) {
                    const vaccines = info.event.extendedProps.vaccines;
                    // console.log(vaccines);
                    const vaccinList = document.createElement('div');
                    const immunizationDate = info.event.extendedProps.date;
                    const today = new Date();
                    const formattedToday = formatDate(today);
                    console.log(immunizationDate, formattedToday);

                    let buttonHtml = '';
                    if (immunizationDate <= formattedToday) {
                        buttonHtml = `
                        <div class="py-2 text-gray-600 text-center">
              <p>Apakah anak anda sudah imunisasi?</p>
            </div>
            <div class="flex justify-center space-x-4">
              <button type="submit" class="text-white inline-flex w-full justify-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Ya, sudah
              </button>
                                    <button type="button" id="modal-close" class="close-modal text-white inline-flex w-full justify-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Belum
                                    </button>
                        `;
                    }

                    vaccinList.id = 'modal-' + info.event.extendedProps.id;
                    vaccinList.className =
                        'fixed top-0 left-0 w-full h-full z-50 overflow-y-auto flex items-center justify-center bg-black bg-opacity-50';
                    vaccinList.innerHTML = `
                    
                    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
              ` + info.event.title + `
            </h3>
            <button type="button" class="close-modal text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
              </svg>
              <span class="sr-only">Close modal</span>
            </button>
          </div>
          <div class="p-4 md:p-5">
            <form id="modal-lihat" action="/user/insert-history" method="POST">
                @csrf
            <p class="text-gray-500 dark:text-gray-400 mb-4">Jenis vaksin:</p>
            <ul class="space-y-4 overflow-y-auto mb-4">
               <input type="hidden" name="id_schedule" value="${info.event.extendedProps.id_schedule}">
               <input type="hidden" name="id_child" value="${info.event.extendedProps.id_child}">
               <input type="hidden" name="date" value="${info.event.extendedProps.date}">
            ${vaccines.map(vaccine => `<li>
                                                                                                            <label for="vaccine-${vaccine}" class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg">
                                                                                                            <div class="block">
                                                                                                            <div class="w-full text-lg font-semibold">${vaccine}</div>
                                                                                                            </div>
                                                                                                            </label>
                                                                                                            </li>
                                                                                                            `).join('')}
            </ul>
            ${buttonHtml}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                    document.body.appendChild(vaccinList);

                    // Menambahkan event listener untuk menutup modal
                    vaccinList.querySelector('.close-modal').addEventListener('click',
                        function() {
                            document.body.removeChild(vaccinList);
                        });
                    document.getElementById('modal-close').addEventListener('click', function() {
                        document.body.removeChild(vaccinList);
                    });
                }
            });
            calendar.render();

            // Fetch data events from server
            fetch('/user/events2')
                .then(response => response.json())
                .then(data => {

                    // Inisialisasi array untuk menyimpan tanggal yang terlewat
                    let overdueImmunizations = [];

                    // Add events to calendar
                    data.forEach(event => {
                        const immunizationDate = event.start;
                        const today = new Date();
                        const formattedToday = formatDate(today);
                        if (immunizationDate < formattedToday) {
                            // Jika ada imunisasi yang terlewat, set variabel ke true
                            // Tambahkan tanggal yang terlewat ke array
                            overdueImmunizations.push(immunizationDate);
                        }

                        calendar.addEvent({
                            title: event.title,
                            start: event.start,
                            allDay: event.allDay,
                            className: 'cursor-pointer my-1 bg-red-500 hover:bg-red-600',
                            borderColor: '#E02424',
                            extendedProps: {
                                status: event.status,
                                id_child: event.id_child,
                                id_schedule: event.id_schedule,
                                title: event.title,
                                vaccines: event.vaccines,
                                date: event.start
                            }
                        });
                    });

                    // Jika ada imunisasi yang terlewat, tampilkan pesan error untuk setiap tanggal
                    if (overdueImmunizations.length > 0) {
                        const alertContainer = document.getElementById('alert-container');
                        overdueImmunizations.forEach(date => {
                            const alert = document.createElement('div');
                            alert.className =
                                'flex items-center p-4 mb-3 text-red-800 rounded-lg bg-red-50 lg:w-1/3';
                            alert.role = 'alert';
                            alert.innerHTML = `
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium">
                            Jadwal imunisasi pada tanggal ${date} terlewat!
                        </div>
                    `;
                            alertContainer.appendChild(alert);
                        });
                        alertContainer.style.display = 'block';
                    }
                });
        });
    </script>

</head>

<body class="bg-red-300">
    @extends('layout.navbar')
    <div class="p-4 pt-[90px]">
        <div class="p-4 border-2 border-gray-200 border-dashed bg-neutral-50 rounded-lg dark:border-gray-700">
            <div class="container px-4 pt-3">
                {{-- breadcrumb --}}
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
                                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Jadwal
                                    Imunisasi</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="container mx-auto px-2 pt-8 pb-[3rem]">
                <h1 class="text-2xl font-sans font-bold text-gray-600 mb-6 lg:text-3xl">
                    <span class="underline underline-offset-3 decoration-8 decoration-red-400 dark:decoration-blue-600">
                        Jadwal Imunisasi
                    </span>
                </h1>
            </div> {{-- table --}}

            {{-- eror jika lewat imunisasi --}}
            <div align="right" class="container pt-[1rem]" id="alert-container" style="display: none;">

            </div>
            {{-- <div align="right" class="container pt-[5rem]">
                <div id="alert-1" class="flex items-center p-4 text-red-800 rounded-lg bg-red-50 lg:w-1/2"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">
                    </div>
                </div>
            </div> --}}
            {{-- eror jika lewat imunisasi selesai --}}

            {{-- kalender imunisasi --}}
            <div class="relative bg-white p-4 overflow-x-auto mt-10 shadow-md rounded-lg ">
                <div class="mt-5 mb-10">
                    <a href="{{ route('user.history') }}"
                        class="bg-red-500 hover:bg-red-600 duration-300 text-white font-medium py-2 px-2 rounded"
                        id="modal-open">Lihat Riwayat Imunisasi</a>
                </div>
                <div id='calendar'></div>
            </div>
            {{-- kalender imunisasi selesai --}}

        </div>
    </div>



    <script>
        function formatDate(date) {
            let year = date.getFullYear();
            let month = String(date.getMonth() + 1).padStart(2, '0');
            let day = String(date.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        }
    </script>
    @vite('resources/js/app.js')
</body>

</html>
