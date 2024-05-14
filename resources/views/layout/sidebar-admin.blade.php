<aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <ul class="space-y-2 font-medium">

            {{-- profile admin --}}
            <li>
                <div class=" rounded-full grid justify-items-center mt-2">
                    <img class="" src="{{ asset('image/man.png') }}" alt="" width="100" srcset="">
                    <p class="mt-3 mb-5">
                        {{ Auth::user()->username }}
                    </p>
                </div>
            </li>
            {{-- dashboard --}}
            <li>
                <a href="{{ route('admin.admin.dashboard') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <img src="{{ asset('image/1.png') }}" width="25" class="fill-red-400" alt=""
                        srcset="">
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            {{-- jadwal imunisasi --}}
            <li>
                <a href="{{ route('admin.schedule') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <img src="{{ asset('image/calendar_clock_schedule.png') }}" width="25" alt=""
                        srcset="">
                    <span class="ms-3">Jadwal Imunisasi</span>
                </a>
            </li>
            {{-- informasi vaksin --}}
            <li>
                <a href="#"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <img src="{{ asset('image/informasi-vaksin.png') }}" width="25" alt="" srcset="">
                    <span class="ms-3">Informasi Vaksin</span>
                </a>
            </li>
        </ul>
        {{-- keluar --}}
        <div class="bg-red-500 rounded ">
            <div class=" font-medium mt-[240px]">
                <a href="{{ route('admin.logout') }}"
                    class="flex items-center p-2 text-white rounded-lg dark:text-white dark:hover:bg-gray-700 group">
                    <img src="{{ asset('image/output.png') }}" width="25" alt="" srcset="">
                    <span class="flex-1 ms-3 whitespace-nowrap">Keluar</span>
                </a>
            </div>
        </div>
    </div>
</aside>
