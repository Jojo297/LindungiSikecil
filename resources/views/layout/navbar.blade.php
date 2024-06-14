 {{-- navbar --}}
 <nav class="bg-white fixed top-0 z-10 w-full border-b-2 border-gray-200 rounded-br-lg rounded-bl-lg dark:bg-gray-900">
     <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
         <a href="{{ route('user.dashboard') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
             <img src="{{ asset('image/logoLindungiSiKecil-removebg-preview2.png') }}" class="" width="45"
                 alt="Flowbite Logo" />
             <span class="self-center text-2xl font-semibold whitespace-nowrap">LindungiSiKecil</span>
         </a>
         <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
             <button type="button"
                 class="flex text-sm ring-offset-2 ring-2 ring-red-500 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                 id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                 data-dropdown-placement="bottom">
                 <span class="sr-only">Open user menu</span>
                 <img class="w-8 h-8 rounded-full" src="{{ asset('image/man.png') }}" alt="user photo">
             </button>
             <!-- Dropdown menu -->
             <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                 id="user-dropdown">
                 <div class="px-4 py-3">
                     <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->username }}</span>
                     <span
                         class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                 </div>
                 <ul class="py-2" aria-labelledby="user-menu-button">

                     <li>
                         <a href="{{ route('user.profile') }}"
                             class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profil
                         </a>
                     </li>
                     <li>
                         <a href="{{ route('logout.user') }}"
                             class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Keluar
                         </a>
                     </li>
                 </ul>
             </div>

         </div>
         <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">

         </div>
     </div>
 </nav>
 {{-- navbar selesai --}}
