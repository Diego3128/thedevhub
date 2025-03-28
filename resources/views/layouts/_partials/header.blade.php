<header class="border-b bg-white shadow border-gray-300 mb-10">
    <div class="container mx-auto p-4 flex justify-between items-center">

        <h1 class="font-bold text-2xl text-black capitalize">thedevhub</h1>

        <nav class="flex gap-2">
            @auth
                <div class="relative group">
                    <a href="#" class="flex items-center space-x-2">
                        <img src="{{ asset('img/account/usuario.svg') }}" alt="Profile Image"
                            class="w-8 h-8 rounded-full object-cover">
                        <span class="font-bold capitalize text-gray-600 text-sm">{{ auth()->user()->username }}</span>
                    </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="hover:cursor-pointer font-bold capitalize text-gray-600 text-sm absolute left-0 mt-2 w-full text-center   bg-white p-2 rounded shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                            Logout
                        </button>
                    </form>
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
