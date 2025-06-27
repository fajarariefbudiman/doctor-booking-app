<x-layouts.main>
    <!-- Mobile Layout (unchanged) -->
    <div class="md:hidden max-w-xl mx-auto h-screen bg-white relative font-poppins flex flex-col overflow-hidden">
        <!-- Header & Background -->
        <div class="relative z-10">
            <div class="absolute top-5 -left-24 w-[199px] h-[199px] bg-[#288CE866] rounded-full z-0"></div>
            <div class="absolute top-5 right-[-100px] w-[199px] h-[199px] bg-[#288CE866] rounded-full z-0"></div>
            <div class="absolute top-5 right-[-130px] w-[199px] h-[199px] bg-[#288CE8B2] rounded-full z-0 opacity-100">
            </div>

            <!-- Logo -->
            <div class="flex justify-center pt-8 pb-36 relative z-10">
                <img src="{{ asset('images/Selaras-Rm-Bg.png') }}" alt="Logo" class="w-[160px]">
            </div>
        </div>

        <!-- Register Box -->
        <div
            class="relative z-10 bg-[#C4C4C4] rounded-t-3xl px-6 py-6 shadow-xl flex-grow flex flex-col justify-between">
            <!-- Title -->
            <div>
                <h2 class="text-center text-2xl font-bold text-[#000] mb-5">Register</h2>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form -->
                <form method="POST" action="{{ route('register.store') }}" class="space-y-2">
                    @csrf
                    <div>
                        <label class="block text-base mb-1 text-[#000]">Full name</label>
                        <input type="text" name="full_name"
                            class="w-full px-4 py-3 bg-[#ECECEC] rounded-full text-base shadow-md placeholder:text-base border-none focus:outline-none focus:ring-2 focus:ring-blue-300">
                    </div>

                    <div>
                        <label class="block text-base mb-1 text-[#000]">Email</label>
                        <input type="email" name="email"
                            class="w-full px-4 py-3 bg-[#ECECEC] rounded-full text-base shadow-md placeholder:text-base border-none focus:outline-none focus:ring-2 focus:ring-blue-300">
                    </div>

                    <div>
                        <label class="block text-base mb-1 text-[#000]">Mobile Number</label>
                        <input type="tel" name="mobile_number"
                            class="w-full px-4 py-3 bg-[#ECECEC] rounded-full text-base shadow-md placeholder:text-base border-none focus:outline-none focus:ring-2 focus:ring-blue-300">
                    </div>

                    <div>
                        <label class="block text-base mb-1 text-[#000]">Password</label>
                        <input type="password" name="password"
                            class="w-full px-4 py-3 bg-[#ECECEC] rounded-full text-base shadow-md placeholder:text-base border-none focus:outline-none focus:ring-2 focus:ring-blue-300">
                    </div>

                    <!-- Sign Up -->
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full bg-[#288CE8B2] text-white py-3 rounded-full font-bold text-lg shadow-lg hover:bg-[#387fc3] transition-all border-none">
                            Sign Up
                        </button>
                    </div>
                </form>
            </div>

            <!-- Sign In Link -->
            <div class="text-center">
                <p class="font-medium text-lg">Already have an account?</p>
                <a href="/login" class="text-[#166FC1E5] font-semibold text-lg hover:underline">Sign In</a>
            </div>
        </div>
    </div>

    <!-- Desktop Layout -->
    <div
        class="hidden md:flex min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-8 relative overflow-hidden">
            <!-- Decorative elements -->
            <div class="absolute -top-10 -right-10 w-24 h-24 bg-[#288CE8] opacity-10 rounded-full"></div>
            <div class="absolute -bottom-8 -left-8 w-20 h-20 bg-[#288CE8] opacity-8 rounded-full"></div>

            <!-- Content -->
            <div class="relative z-10">
                <!-- Logo -->
                <div class="text-center mb-8">
                    <img src="{{ asset('images/Selaras-Rm-Bg.png') }}" alt="Logo" class="w-32 mx-auto mb-4">
                    <h2 class="text-2xl font-bold text-gray-800">Create Account</h2>
                    <p class="text-gray-500 mt-2">Join us today</p>
                </div>

                <!-- Form -->
                <form method="POST" action="{{ route('register.store') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                        <input type="text" name="full_name""
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#288CE8] focus:border-transparent transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" name="email"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#288CE8] focus:border-transparent transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Mobile Number</label>
                        <input type="tel" name="mobile_number"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#288CE8] focus:border-transparent transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input type="password" name="password"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#288CE8] focus:border-transparent transition-all">
                    </div>

                    <!-- Sign Up Button -->
                    <button type="submit"
                        class="w-full bg-[#288CE8] text-white py-3 rounded-xl font-semibold text-sm shadow-lg hover:bg-[#2563eb] hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 mt-6">
                        Create Account
                    </button>
                </form>

                <!-- Sign In Link -->
                <div class="text-center mt-6">
                    <p class="text-sm text-gray-600">
                        Already have an account?
                        <a href="/login"
                            class="text-[#288CE8] font-semibold hover:text-[#2563eb] hover:underline transition-colors ml-1">
                            Sign in
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
