<div class="flex flex-wrap">
    @forelse ($information as $informations => $data)
        {{-- informasi vaksin --}}
        <div class="w-full {{ count($information) == 1 ? '' : 'md:w-1/2 lg:w-1/2' }}">
            <div
                class="block max-w-sm p-[15px] mb-4 md:mr-8 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                {{-- button dropdown delete and edit --}}
                <div class="flex justify-end">
                    <button id="dropdownButton-{{ $data->id_information }}"
                        data-dropdown-toggle="dropdown-{{ $data->id_information }}"
                        class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                        type="button">
                        <span class="sr-only">Open dropdown</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 16 3">
                            <path
                                d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                        </svg>
                    </button>
                </div>
                <div class="">
                    <h5 class="mb-2 text-2xl text-left font-bold tracking-tight text-gray-900 dot dark:text-white">
                        {{ $data->heading }}</h5>
                    <p id="clamped-text"
                        class="font-normal text-left text-gray-700 relative z-10 line-clamp-3 ck-content">
                        {{ Str::limit(strip_tags($data->body), 200) }}
                    </p>
                    <div class="flex justify-start relative z-20 mt-5">
                        <a href="/admin/detail-informasi/{{ $data->id_information }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Baca Selengkapnya
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- dropdown menu edit and delete --}}
        <div id="dropdown-{{ $data->id_information }}"
            class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2" aria-labelledby="dropdownButton-{{ $data->id_information }}">
                <li>
                    <a href="/admin/edit-informasi/{{ $data->id_information }}"
                        class="block px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Ubah</a>
                </li>
                <li align="left">
                    <a data-modal-target="popup-modal-{{ $data->id_information }}"
                        data-modal-toggle="popup-modal-{{ $data->id_information }}"
                        class="block px-4 py-2 text-left text-sm cursor-pointer text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Hapus</a>
                </li>
            </ul>
        </div>
        {{-- dropdown menu edit and delete selesai --}}
        {{-- modal validasi hapus --}}
        <div id="popup-modal-{{ $data->id_information }}" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="popup-modal-{{ $data->id_information }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are
                            you
                            Apakah anda yakin ingin menghapus artikel ini?</h3>
                        <form method="POST" action="/admin/hapus-informasi/{{ $data->id_information }}">
                            @csrf @method('DELETE')
                            <button type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Ya, saya yakin
                            </button>

                            <button data-modal-hide="popup-modal-{{ $data->id_information }}" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- modal validasi hapus --}}
    @empty
    @endforelse
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('[id^="dropdownButton-"]').click(function() {
            var dropdownId = $(this).attr('id').split('-')[1];
            $('#dropdown-' + dropdownId).removeClass('hidden');
        });
        $('[id^="popup-modal-"]').click(function() {
            var popUp = $(this).attr('id').split('-')[1];
            $('#popup-modal-' + popUp).removeClass('hidden');
        });
    });
</script>
