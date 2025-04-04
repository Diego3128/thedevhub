<header class="border-b bg-white shadow border-gray-300 mb-10">
    <div class="container mx-auto p-4 flex justify-between items-center">

        <h1 class="font-bold text-2xl text-black capitalize">thedevhub</h1>

        <nav class="flex gap-2">
            @auth
                <div class="flex items-center gap-1.5 xs:gap-4 md:gap-7">
                    <a class="flex items-center gap-2  bg-white border-2 border-gray-300 hover:border-gray-600 text-gray-600 rounded-lg p-2 cursor-pointer"
                        href="{{ route('posts.create') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                        </svg>
                        <span class="hidden xs:inline">
                            New
                        </span>
                    </a>

                    <div class="relative group">
                        <a href="{{ route('post.index', ['username' => auth()->user()->username]) }}"
                            class="flex items-center space-x-2">
                            <img src="{{ asset('img/account/usuario.svg') }}" alt="Profile Image"
                                class="w-10 h-10 rounded-full object-cover">
                            <span
                                class="hidden xs:inline font-bold capitalize text-gray-600 text-sm">{{ auth()->user()->username }}</span>
                        </a>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="hover:cursor-pointer font-bold capitalize text-gray-600 text-sm absolute left-0 mt-2 w-full text-center   bg-white p-2 rounded shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>

            @endauth

            @guest()
                <div class="relative">
                    <button id="dropdownButton" class="font-bold capitalize text-gray-600 text-sm">
                        Start
                    </button>
                    <div id="dropdownMenu"
                        class="absolute left-0 mt-2 w-32 bg-white border border-gray-300 rounded-lg shadow-lg hidden">
                        @guest
                            <a href="{{ route('login.index') }}"
                                class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Login</a>
                            <a href="{{ route('register.index') }}"
                                class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Register</a>
                        @endguest
                    </div>
                </div>
            @endguest
        </nav>
    </div>
</header>
