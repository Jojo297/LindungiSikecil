<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/app.js') }}"></script>

</head>
<!-- component -->

<body class="antialiased bg-gradient-to-br from-red-100 to-white">


    <div class="container px-6 mx-auto ">

        <div class="flex flex-col text-center md:text-left md:flex-row justify-evenly md:items-center">

            <div class="w-full pb-5 my-auto md:w-full lg:w-1/2 md:mx-0">
                <div class="flex flex-col items-center justify-center min-h-screen">
                    <div class="bg-white p-10  flex flex-col w-full shadow-xl rounded-xl">
                        <h2 class="text-2xl font-bold text-gray-800 text-center mb-5">
                            Masukkan Nomor WhatsApp
                        </h2>

                        <form method="POST" action="{{ route('change-wa-send') }}">
                            @csrf
                            <div class="items-center justify-center mt-4 mb-3 space-x-2 rtl:space-x-reverse">
                                {{-- No wa --}}
                                <div id="input" class="flex flex-col w-full my-5">
                                    <div class="relative w-full">
                                        <div
                                            class="absolute inset-y-0 start-0 top-0 flex items-center ps-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                                <path fill="#04e75b"
                                                    d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                                            </svg>
                                        </div>
                                        <input type="text" id="noWa" name="noWa" maxlength="15"
                                            aria-describedby="helper-text-explanation" value="{{ old('noWa') }}"
                                            class=" border border-gray-100 text-gray-900 rounded-lg px-4 py-4 placeholder-gray-300 focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5
                                        form-control
                                        @error('noWa') is-invalid @enderror"
                                            placeholder="08xxx" />
                                    </div>
                                </div>
                                {{-- no wa --}}
                                @error('noWa')
                                    <div id="alert-3"
                                        class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                        role="alert">
                                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <div class="ms-3 text-sm font-medium">
                                            {{ $message }}
                                        </div>
                                        <button type="button"
                                            class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                                            data-dismiss-target="#alert-3" aria-label="Close">
                                            <span class="sr-only">Close</span>
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                        </button>
                                    </div>
                                @enderror
                            </div>

                            <div id="button" class="flex flex-col w-full my-5">
                                <div class="flex items-start mb-6">
                                    <div class="flex items-center h-5">
                                        <input id="remember" type="checkbox" name="check"
                                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800
                                            form-control
                                            @error('check') is-invalid @enderror" />
                                        <label for="remember"
                                            class="ms-2 text-xs font-medium text-gray-900 dark:text-gray-300 md:text-sm lg:text-sm">Saya
                                            setuju
                                            mengirimkan <a class="text-red-500 hover:underline dark:text-blue-500">kode
                                                OTP
                                                ke WhatsApp</a>.</label>
                                    </div>
                                </div>
                                {{-- check --}}
                                @error('check')
                                    <div id="alert-2"
                                        class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                        role="alert">
                                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <div class="ms-3 text-sm font-medium">
                                            {{ $message }}
                                        </div>
                                        <button type="button"
                                            class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                                            data-dismiss-target="#alert-2" aria-label="Close">
                                            <span class="sr-only">Close</span>
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                        </button>
                                    </div>
                                @enderror
                                {{-- loading --}}
                                <div align="center" id="loading-indicator" class="hidden" role="status">
                                    <svg aria-hidden="true"
                                        class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-red-500"
                                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                            fill="currentColor" />
                                        <path
                                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                            fill="currentFill" />
                                    </svg>
                                    <span class="sr-only">Loading...</span>
                                </div>
                                {{-- loading selesai --}}

                                <button type="submit" id="button1"
                                    class="w-full py-4 bg-red-400 hover:bg-red-500 rounded-lg text-green-100">
                                    <div class="flex flex-row items-center justify-center">

                                    </div>
                                    <div class="font-bold">Kirim kode OTP</div>
                            </div>
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    @vite('resources/js/app.js')
    <script src="{{ asset('js/input-otp.js') }}"></script>
</body>

</html>
