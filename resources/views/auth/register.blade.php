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


        <!-- Register Box -->
        <div
            class="relative z-10 bg-[#C4C4C4] rounded-t-3xl px-6 py-6 shadow-xl flex-grow flex flex-col justify-between">
            <!-- Title -->
            <div>
                <h2 class="text-center text-2xl font-bold text-[#000] mb-5">Register</h2>

                <!-- Form -->
                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-base mb-1 text-[#000]">Full name</label>
                        <input type="text" name="name"
                            class="w-full px-4 py-3 bg-[#ECECEC] rounded-full text-base shadow-md placeholder:text-base border-none focus:outline-none focus:ring-2 focus:ring-blue-300">
                    </div>

                    <div>
                        <label class="block text-base mb-1 text-[#000]">Email</label>
                        <input type="email" name="email"
                            class="w-full px-4 py-3 bg-[#ECECEC] rounded-full text-base shadow-md placeholder:text-base border-none focus:outline-none focus:ring-2 focus:ring-blue-300">
                    </div>

                    <div>
                        <label class="block text-base mb-1 text-[#000]">Mobile Number</label>
                        <input type="tel" name="phone"
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
</x-layouts.main>
