<div class="flex flex-wrap">
    @forelse ($information as $informations => $data)
        {{-- informasi vaksin --}}
        <div class="w-full {{ count($information) == 1 ? '' : 'md:w-1/2 lg:w-1/3' }}">
            <div
                class="block max-w-sm p-[15px] mb-4 md:mr-8 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">

                <a href="/admin/detail-informasi/{{ $data->id_information }}">
                    <h5 class="mb-2 text-2xl text-left font-bold tracking-tight text-gray-900 truncate dark:text-white">
                        {{ $data->heading }}</h5>
                    <p class="font-normal text-left text-gray-700 line-clamp-3">{{ $data->body }}
                    </p>
                </a>
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
