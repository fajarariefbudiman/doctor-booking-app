<x-layouts.main>
    <!-- Mobile Layout (unchanged) -->
    <div class="md:hidden max-w-xl mx-auto min-h-screen bg-white font-poppins py-8 px-6 space-y-6">

        <!-- Header -->
        <div class="text-2xl font-bold text-[#166FC1]">Settings</div>

        <!-- Profile Photo & Info -->
        <div class="flex flex-col items-center space-y-2">
            <div class="relative">
                <div
                    class="w-24 h-24 rounded-full overflow-hidden border-4 border-[#E0EFFF] bg-[#ECECEC] flex items-center justify-center">
                    <img src="{{ asset('images/dr-murphy.jpg') }}" alt="Profile" class="object-cover w-full h-full">
                </div>
                <button
                    class="absolute bottom-1 right-0 bg-white rounded-full p-1 border shadow hover:bg-gray-100 transition">
                    <i class="fas fa-pen text-sm text-[#166FC1]"></i>
                </button>
            </div>
            <div class="text-lg font-bold text-[#166FC1]">{{ $user->full_name }}</div>
            <div class="text-sm text-gray-600">{{ $user->email }}</div>
        </div>

        <!-- Settings List -->
        <div class="space-y-4">
            @php
                $settings = [
                    ['icon' => 'fa-user', 'label' => 'Account'],
                    ['icon' => 'fa-bell', 'label' => 'Notification'],
                    ['icon' => 'fa-eye', 'label' => 'Appearance'],
                    ['icon' => 'fa-shield-alt', 'label' => 'Privacy & Security'],
                    ['icon' => 'fa-volume-up', 'label' => 'Sound'],
                    ['icon' => 'fa-globe', 'label' => 'Language'],
                ];
            @endphp

            @foreach ($settings as $setting)
                <div class="flex items-center justify-between border-b pb-3 text-[#166FC1]">
                    <div class="flex items-center gap-3">
                        <i class="fas {{ $setting['icon'] }} text-lg"></i>
                        <span class="text-base">{{ $setting['label'] }}</span>
                    </div>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                </div>
            @endforeach

            <!-- Logout for Mobile -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full">
                    <div class="flex items-center justify-between border-b pb-3 text-red-600">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-sign-out-alt text-lg"></i>
                            <span class="text-base">Logout</span>
                        </div>
                    </div>
                </button>
            </form>
        </div>

        <!-- Bottom Navbar -->
        <div class="pt-10">
            <x-button-nav />
        </div>
    </div>

    <!-- Desktop Layout (Simplified) -->
    <div class="hidden md:block">
        <!-- TOP NAVBAR DESKTOP -->
        <nav
            class="hidden md:flex justify-between items-center bg-white px-6 py-4 shadow-md font-poppins border-b border-gray-200">
            <a href="{{ route('home') }}" class="text-lg font-bold text-[#236EB3]">Selaras</a>
            <div class="flex gap-6 text-sm font-medium">
                <a href="{{ route('home') }}"
                    class="{{ request()->routeIs('home') ? 'text-[#236EB3]' : 'text-gray-600 hover:text-[#236EB3]' }}">Home</a>
                <a href="{{ route('doctors.index') }}"
                    class="{{ request()->routeIs('doctors.*') ? 'text-[#236EB3]' : 'text-gray-600 hover:text-[#236EB3]' }}">Doctors</a>
                <a href="{{ route('about') }}"
                    class="{{ request()->routeIs('about') ? 'text-[#236EB3]' : 'text-gray-600 hover:text-[#236EB3]' }}">About</a>
                @auth
                    <a href="{{ route('profile.edit') }}"
                        class="{{ request()->routeIs('profile.edit') ? 'text-[#236EB3]' : 'text-gray-600 hover:text-[#236EB3]' }}">Profile</a>
                @else
                    <a href="{{ route('login') }}"
                        class="{{ request()->routeIs('login') ? 'text-[#236EB3]' : 'text-gray-600 hover:text-[#236EB3]' }}">Login</a>
                @endauth
            </div>
        </nav>
        <div class="bg-gray-50 min-h-screen">
            <div class="max-w-4xl mx-auto px-6 py-8">

                <!-- Header -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-[#166FC1]">Settings</h1>
                    <p class="text-gray-600 mt-2">Manage your account and preferences</p>
                </div>

                <!-- Profile Section -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <div
                                class="w-20 h-20 rounded-full overflow-hidden bg-[#ECECEC] flex items-center justify-center">
                                <img src="{{ asset('images/dr-murphy.jpg') }}" alt="Profile"
                                    class="object-cover w-full h-full">
                            </div>
                            <button
                                class="absolute -bottom-1 -right-1 bg-[#166FC1] text-white rounded-full p-2 text-xs hover:bg-blue-700 transition">
                                <i class="fas fa-pen"></i>
                            </button>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-xl font-semibold text-[#166FC1]">{{ $user->full_name }}</h2>
                            <p class="text-gray-600">{{ $user->email }}</p>
                        </div>
                        <button class="bg-[#166FC1] text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                            Edit Profile
                        </button>
                    </div>
                </div>

                <!-- Settings List -->
                <div class="bg-white rounded-lg shadow-sm">
                    @php
                        $settings = [
                            ['icon' => 'fa-user', 'label' => 'Account', 'desc' => 'Manage your account information'],
                            [
                                'icon' => 'fa-bell',
                                'label' => 'Notification',
                                'desc' => 'Configure notification preferences',
                            ],
                            ['icon' => 'fa-eye', 'label' => 'Appearance', 'desc' => 'Customize your interface'],
                            [
                                'icon' => 'fa-shield-alt',
                                'label' => 'Privacy & Security',
                                'desc' => 'Control your privacy settings',
                            ],
                            ['icon' => 'fa-volume-up', 'label' => 'Sound', 'desc' => 'Adjust sound settings'],
                            ['icon' => 'fa-globe', 'label' => 'Language', 'desc' => 'Choose your preferred language'],
                        ];
                    @endphp

                    @foreach ($settings as $index => $setting)
                        <div
                            class="flex items-center justify-between p-4 hover:bg-gray-50 cursor-pointer {{ $index > 0 ? 'border-t border-gray-100' : '' }}">
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-10 h-10 bg-[#166FC1] rounded-lg flex items-center justify-center text-white">
                                    <i class="fas {{ $setting['icon'] }}"></i>
                                </div>
                                <div>
                                    <div class="font-medium text-gray-900">{{ $setting['label'] }}</div>
                                    <div class="text-sm text-gray-500">{{ $setting['desc'] }}</div>
                                </div>
                            </div>
                            <i class="fas fa-chevron-right text-gray-400"></i>
                        </div>
                    @endforeach

                    <!-- Logout Item -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left">
                            <div
                                class="flex items-center justify-between p-4 hover:bg-red-50 cursor-pointer border-t border-gray-100">
                                <div class="flex items-center space-x-3">
                                    <div
                                        class="w-10 h-10 bg-red-500 rounded-lg flex items-center justify-center text-white">
                                        <i class="fas fa-sign-out-alt"></i>
                                    </div>
                                    <div>
                                        <div class="font-medium text-red-600">Logout</div>
                                        <div class="text-sm text-gray-500">Sign out of your account</div>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-layouts.main>
