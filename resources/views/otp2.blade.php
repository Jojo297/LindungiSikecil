<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                            Verifikasi kode OTP
                        </h2>
                        {{-- waktu --}}
                        <div class="flex flex-col items-center">
                            <p class="text-sm text-gray-600 text-center">Hitung mundur ganti nomer WhatsApp:
                            </p>
                            <p class="text-gray-600 text-center" id="countdown"></p>

                        </div>
                        <form action="{{ route('virifyOtpAgain') }}" method="POST">
                            @csrf
                            <div
                                class="flex flex-row  items-center justify-center mt-5 mb-4 space-x-2 rtl:space-x-reverse">

                                {{-- input otp --}}
                                <div>
                                    <label for="code-1" class="sr-only">First code</label>
                                    <input type="text" maxlength="1" data-focus-input-init
                                        data-focus-input-next="code-2" id="code-1" name="otp[]"
                                        class="w-10 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required />
                                </div>
                                <div>
                                    <label for="code-2" class="sr-only">Second code</label>
                                    <input type="text" maxlength="1" data-focus-input-init
                                        data-focus-input-prev="code-1" data-focus-input-next="code-3" id="code-2"
                                        name="otp[]"
                                        class="w-10 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required />
                                </div>
                                <div>
                                    <label for="code-3" class="sr-only">Third code</label>
                                    <input type="text" maxlength="1" data-focus-input-init
                                        data-focus-input-prev="code-2" data-focus-input-next="code-4" id="code-3"
                                        name="otp[]"
                                        class="w-10 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required />
                                </div>
                                <div>
                                    <label for="code-4" class="sr-only">Fourth code</label>
                                    <input type="text" maxlength="1" data-focus-input-init
                                        data-focus-input-prev="code-3" data-focus-input-next="code-5" id="code-4"
                                        name="otp[]"
                                        class="w-10 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required />
                                </div>
                                <div>
                                    <label for="code-5" class="sr-only">Fifth code</label>
                                    <input type="text" maxlength="1" data-focus-input-init
                                        data-focus-input-prev="code-4" data-focus-input-next="code-6" id="code-5"
                                        name="otp[]"
                                        class="w-10 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required />
                                </div>
                                <div>
                                    <label for="code-6" class="sr-only">Sixth code</label>
                                    <input type="text" maxlength="1" data-focus-input-init
                                        data-focus-input-prev="code-5" id="code-6" name="otp[]"
                                        class="w-10 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required />
                                </div>
                            </div>


                            <div id="button" class="flex flex-col w-full my-5">
                                <div class="mt-5">
                                    <p id="helper-text-explanation"
                                        class="text-xs text-center text-gray-500 dark:text-gray-400 md:text-sm lg:text-sm">
                                        Masukkan 6 digit kode yang kami kirim melalui WhatsApp,</p>
                                    <p
                                        class="text-xs text-center mb-2 text-gray-500 dark:text-gray-400 md:text-sm lg:text-sm">
                                        anda bisa mengganti nomor WhatsApp anda setelah<strong
                                            class="font-semibold text-gray-900"> 10 menit </strong></p>
                                </div>
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
                                {{-- kirim ulang --}}
                                <div class="mb-3">
                                    <a href="{{ route('change-wa') }}" align="center" type="button" id="resend-button"
                                        class="text-white w-full bg-blue-400 text-center cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5"
                                        disabled>
                                        Ganti nomer WhatsApp
                                    </a>
                                </div>
                                {{-- verifikasi --}}
                                <button type="submit" id="button1"
                                    class="w-full py-4 bg-red-400 hover:bg-red-500 rounded-lg text-green-100">
                                    <div class="flex flex-row items-center justify-center">
                                    </div>
                                    <div class="font-bold">Verifikasi</div>
                                </button>


                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @vite('resources/js/app,js')
    <script src="{{ asset('js/countdown.js') }}"></script>
    <script src="{{ asset('js/input-otp.js') }}"></script>
</body>

</html>
