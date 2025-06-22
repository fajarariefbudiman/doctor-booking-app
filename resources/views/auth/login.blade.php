<x-layouts.main>
    <div class="max-w-xl mx-auto h-screen bg-white relative font-poppins flex flex-col overflow-hidden">

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
                <!-- Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-base mb-1 text-[#000]">Mobile Number / Email</label>
                        <input type="tel" name="email"
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
                        Don’t have an account?
                        <a href="{{ route('register') }}" class="text-[#288CE8] font-semibold hover:underline">Sign
                            Up</a>
                    </p>
                </div>

            </div>

        </div>

    </div>

</x-layouts.main>
