<nav class="fixed bottom-0 left-0 right-0 bg-white shadow-lg border-t border-gray-200 z-50 md:hidden">
    <div class="max-w-xl mx-auto flex justify-around py-3 sm:py-4">
        <a href="{{ route('home') }}"
            class="flex flex-col items-center text-xs sm:text-sm font-poppins transition-colors duration-200 {{ request()->routeIs('home') ? 'text-blue-700' : 'text-gray-600 hover:text-blue-700' }}">
            <i class="fas fa-home text-xl sm:text-2xl mb-1"></i>
            Home
        </a>

        <a href="{{ route('doctors.index') }}"
            class="flex flex-col items-center text-xs sm:text-sm font-poppins transition-colors duration-200 {{ request()->routeIs('doctors.index') ? 'text-blue-700' : 'text-gray-600 hover:text-blue-700' }}">
            <i class="fas fa-user-md text-xl sm:text-2xl mb-1"></i>
            Doctors
        </a>

        @guest
            <a href="{{ route('login') }}"
                class="flex flex-col items-center text-xs sm:text-sm font-poppins transition-colors duration-200 {{ request()->routeIs('login') ? 'text-blue-700' : 'text-gray-600 hover:text-blue-700' }}">
                <i class="fas fa-user-circle text-xl sm:text-2xl mb-1"></i>
                Account
            </a>
        @else
            <a href="{{ route('profile.edit') }}"
                class="flex flex-col items-center text-xs sm:text-sm font-poppins transition-colors duration-200 {{ request()->routeIs('profile.edit') ? 'text-blue-700' : 'text-gray-600 hover:text-blue-700' }}">
                <i class="fas fa-user-circle text-xl sm:text-2xl mb-1"></i>
                Profile
            </a>
        @endguest

        <a href="{{ route('about') }}"
            class="flex flex-col items-center text-xs sm:text-sm font-poppins transition-colors duration-200 {{ request()->routeIs('about') ? 'text-blue-700' : 'text-gray-600 hover:text-blue-700' }}">
            <i class="fas fa-info-circle text-xl sm:text-2xl mb-1"></i>
            About
        </a>
    </div>
</nav>
