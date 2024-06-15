<div class="flex flex-wrap">
    @forelse ($information as $informations => $data)
        {{-- informasi vaksin --}}
        <div class="w-full {{ count($information) == 1 ? '' : 'md:w-1/2 lg:w-1/3' }}">
            <div
                class="block max-w-sm p-6 mb-4 md:mr-8 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                <h5 class="mb-2 text-2xl text-left font-bold tracking-tight text-gray-900 dot dark:text-white">
                    {{ $data->heading }}</h5>
                <p id="clamped-text" class="font-normal text-left text-gray-700 line-clamp-3 ck-content">
                    {{ Str::limit(strip_tags($data->body), 200) }}
                </p>
                <div class="flex justify-start mt-3">
                    <a href="/user/detail-informasi/{{ $data->id_information }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Baca Selengkapnya
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>


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
