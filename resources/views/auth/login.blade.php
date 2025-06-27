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

        <!-- Log In Box -->
        <div
            class="relative z-10 bg-[#C4C4C4] rounded-t-3xl px-6 py-7 pb-6 shadow-xl flex-grow flex flex-col justify-between">
            <!-- Title -->
            <div>
                <h2 class="text-center text-2xl font-bold text-[#000] mb-5">Log In</h2>

                <!-- Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-base mb-1 text-[#000]">Mobile Number / Email</label>
                        <input type="text" name="email"
                            class="w-full px-4 py-3 bg-[#ECECEC] rounded-full text-base shadow-md placeholder:text-base border-none focus:outline-none focus:ring-2 focus:ring-blue-300">
                    </div>

                    <div>
                        <label class="block text-base mb-1 text-[#000]">Password</label>
                        <input type="password" name="password"
                            class="w-full px-4 py-3 bg-[#ECECEC] rounded-full text-base shadow-md placeholder:text-base border-none focus:outline-none focus:ring-2 focus:ring-blue-300">
                    </div>

                    <!-- Log In -->
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full bg-[#288CE8B2] text-white py-3 rounded-full font-bold text-lg shadow-lg hover:bg-[#387fc3] transition-all border-none">
                            Log In
                        </button>
                    </div>
                </form>

                <!-- Forgot Password & Sign Up -->
                <div class="text-center mt-6 space-y-3">
                    <a href="/forgot-password" class="text-lg font-medium hover:underline">Forgot password?</a>

                    <p class="text-lg font-medium">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="text-[#288CE8] font-semibold hover:underline">Sign
                            Up</a>
                    </p>
                </div>
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
                    <h2 class="text-2xl font-bold text-gray-800">Welcome Back</h2>
                    <p class="text-gray-500 mt-2">Sign in to your account</p>
                </div>

                <!-- Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Mobile Number / Email</label>
                        <input type="text" name="email"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#288CE8] focus:border-transparent transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input type="password" name="password"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#288CE8] focus:border-transparent transition-all">
                    </div>

                    <!-- Log In Button -->
                    <button type="submit"
                        class="w-full bg-[#288CE8] text-white py-3 rounded-xl font-semibold text-sm shadow-lg hover:bg-[#2563eb] hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                        Sign In
                    </button>
                </form>

                <!-- Links -->
                <div class="text-center mt-6 space-y-4">
                    <a href="/forgot-password"
                        class="text-sm text-[#288CE8] hover:text-[#2563eb] font-medium hover:underline transition-colors">
                        Forgot your password?
                    </a>

                    <p class="text-sm text-gray-600">
                        Don't have an account?
                        <a href="{{ route('register') }}"
                            class="text-[#288CE8] font-semibold hover:text-[#2563eb] hover:underline transition-colors ml-1">
                            Create account
                        </a>
                    </p>
                </div>

            </div>
        </div>
    </div>
</x-layouts.main>
