<x-layouts.main>
    <div class="max-w-xl mx-auto min-h-screen bg-white font-poppins py-8 px-6 space-y-6">

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
            <div class="text-lg font-bold text-[#166FC1]">Julia Mario</div>
            <div class="text-sm text-gray-600">juliamario@mail.com</div>
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
        </div>

        <!-- Bottom Navbar -->
        <div class="pt-10">
            <x-button-nav />
        </div>
    </div>
</x-layouts.main>
