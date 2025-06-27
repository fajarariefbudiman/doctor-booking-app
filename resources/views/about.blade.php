<x-layouts.main>
    <!-- Mobile Layout (unchanged) -->
    <div class="md:hidden max-w-xl mx-auto min-h-screen px-6 pt-12 pb-20 bg-white font-poppins relative overflow-hidden">
        <!-- Konten Utama -->
        <div class="relative z-10">
            <!-- Visi Section -->
            <div class="mb-10">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-5 h-5 bg-black rotate-45 rounded-sm shadow-md"></div>
                    <h2 class="text-xl font-extrabold text-black tracking-wide">visi</h2>
                </div>
                <p class="text-sm text-black/90 leading-relaxed">
                    Menjadikan Rumah Sakit yang memiliki kualitas prima dalam pelayanan dan pengabdian kepada
                    masyarakat.
                </p>
            </div>

            <!-- Misi Section -->
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-5 h-5 bg-black rotate-45 rounded-sm shadow-md"></div>
                    <h2 class="text-xl font-extrabold text-black tracking-wide">MISI</h2>
                </div>
                <div class="space-y-4 text-sm text-black/90 leading-relaxed">
                    <p>
                        Memberikan pelayanan kesehatan yang bermutu, cepat, tepat tanpa membeda-bedakan suku, agama dan
                        golongan dengan biaya terjangkau.
                    </p>
                    <p>
                        Melakukan tindakan dan perawatan pasien secara profesional dan berkualitas.
                    </p>
                    <p>
                        Meningkatkan kinerja para tenaga kerja kesehatan sekaligus juga meningkatkan kesejahteraan
                        mereka.
                    </p>
                    <p>
                        Meningkatkan kualitas sumber daya manusia dalam mendukung mutu pelayanan melalui pendidikan dan
                        pelatihan.
                    </p>
                    <p>
                        Memegang komitmen dan bertanggung jawab untuk menyukseskan seluruh program rumah sakit.
                    </p>
                </div>
            </div>
        </div>

        <!-- Gelembung Biru Bawah -->
        <div class="absolute bottom-0 left-0 w-full h-56 z-0 overflow-hidden">
            <div class="absolute left-[-40px] bottom-[0px] w-[171px] h-[197px] bg-blue-400 rounded-full opacity-90">
            </div>
            <div class="absolute left-[20px] bottom-[-20px] w-[199px] h-[199px] bg-[#4D9CFF] rounded-full opacity-90">
            </div>
        </div>

        <x-button-nav />
    </div>

    <!-- Desktop Layout -->
    <div class="hidden md:block">
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

        <div class="bg-gradient-to-br from-blue-50 to-white min-h-screen">
            <div class="max-w-7xl mx-auto px-6 py-12">

                <!-- Vision & Mission Content -->
                <div class="max-w-4xl mx-auto space-y-12">
                    <!-- Vision Section -->
                    <div
                        class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100 hover:shadow-2xl transition-all duration-500">
                        <div class="flex items-center gap-4 mb-6">
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-[#166FC1] to-blue-600 rotate-45 rounded-xl shadow-lg flex items-center justify-center">
                                <div class="w-6 h-6 bg-white rounded-sm -rotate-45"></div>
                            </div>
                            <h2 class="text-3xl font-bold text-[#166FC1] tracking-wide">VISION</h2>
                        </div>
                        <div class="bg-gradient-to-r from-blue-50 to-white p-6 rounded-2xl border-l-4 border-[#166FC1]">
                            <p class="text-lg text-gray-700 leading-relaxed font-medium">
                                Menjadikan Rumah Sakit yang memiliki kualitas prima dalam pelayanan dan pengabdian
                                kepada masyarakat.
                            </p>
                        </div>
                    </div>

                    <!-- Mission Section -->
                    <div
                        class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100 hover:shadow-2xl transition-all duration-500">
                        <div class="flex items-center gap-4 mb-6">
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-[#166FC1] to-blue-600 rotate-45 rounded-xl shadow-lg flex items-center justify-center">
                                <div class="w-6 h-6 bg-white rounded-sm -rotate-45"></div>
                            </div>
                            <h2 class="text-3xl font-bold text-[#166FC1] tracking-wide">MISSION</h2>
                        </div>
                        <div class="space-y-4">
                            @php
                                $missions = [
                                    'Memberikan pelayanan kesehatan yang bermutu, cepat, tepat tanpa membeda-bedakan suku, agama dan golongan dengan biaya terjangkau.',
                                    'Melakukan tindakan dan perawatan pasien secara profesional dan berkualitas.',
                                    'Meningkatkan kinerja para tenaga kerja kesehatan sekaligus juga meningkatkan kesejahteraan mereka.',
                                    'Meningkatkan kualitas sumber daya manusia dalam mendukung mutu pelayanan melalui pendidikan dan pelatihan.',
                                    'Memegang komitmen dan bertanggung jawab untuk menyukseskan seluruh program rumah sakit.',
                                ];
                            @endphp

                            @foreach ($missions as $index => $mission)
                                <div
                                    class="flex items-start gap-4 p-4 bg-gradient-to-r from-blue-50 to-white rounded-xl border-l-4 border-blue-300 hover:border-[#166FC1] transition-colors duration-300">
                                    <div
                                        class="flex-shrink-0 w-8 h-8 bg-[#166FC1] text-white rounded-full flex items-center justify-center font-bold text-sm mt-1">
                                        {{ $index + 1 }}
                                    </div>
                                    <p class="text-gray-700 leading-relaxed">{{ $mission }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-layouts.main>
