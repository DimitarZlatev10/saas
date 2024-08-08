<div>
    <!-- Hero Section -->
    <section class="relative bg-blue-600">
        <div class="absolute inset-x-0 top-[-10rem] -z-10 transform overflow-hidden blur-3xl">
            <svg class="relative left-[calc(50%-11rem)] -translate-x-1/2 rotate-[30deg] max-w-none -z-10"
                viewBox="0 0 1155 678" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill="url(#d2c5b44e-94f0-4f55-93cf-8b773bf4d64b)" fill-opacity=".3"
                    d="M317.673 492.023L137.181 683.021 0 683.021 0 0 317.673 492.023Z" />
                <defs>
                    <linearGradient id="d2c5b44e-94f0-4f55-93cf-8b773bf4d64b" x1="0" x2="1" y1="1"
                        y2="0">
                        <stop stop-color="#9089FC" />
                        <stop offset={1} stop-color="#FF80B5" />
                    </linearGradient>
                </defs>
            </svg>
        </div>
        <div class="relative px-6 pt-16 pb-32 mx-auto max-w-7xl lg:px-8">
            <div>
                <div>
                    <nav>
                        <div class="relative flex h-9 items-center justify-between">
                            <div class="flex items-center justify-center w-full">
                                <div class="text-center text-4xl font-extrabold text-white">Welcome to Our Business
                                    Directory</div>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="mt-16 text-center">
                    <h1 class="text-4xl font-extrabold text-white sm:text-6xl">Find and Manage Your Business
                        Effortlessly</h1>
                    <p class="mt-6 text-lg leading-8 text-gray-300">Explore a wide range of businesses, read reviews,
                        book appointments, and much more.</p>
                    <div class="mt-8 flex justify-center">
                        <a href="{{ route('businesses.index') }}"
                            class="inline-block px-6 py-3 text-base font-semibold text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">Explore
                            Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div>
                <h2 class="text-3xl font-extrabold text-center text-gray-900">Our Features</h2>
                <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                    <!-- Feature 1 -->
                    <div class="relative bg-gray-50 p-6 rounded-lg shadow-md">
                        <div class="absolute inset-x-0 top-0 -translate-y-1/2 transform text-gray-200">
                            <svg class="h-20 w-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16m-7 6h7" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">Feature 1</h3>
                        <p class="mt-4 text-gray-600">Description of feature 1. It can be something that highlights the
                            benefits of using your directory.</p>
                    </div>
                    <!-- Feature 2 -->
                    <div class="relative bg-gray-50 p-6 rounded-lg shadow-md">
                        <div class="absolute inset-x-0 top-0 -translate-y-1/2 transform text-gray-200">
                            <svg class="h-20 w-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16m-7 6h7M4 12h16" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">Feature 2</h3>
                        <p class="mt-4 text-gray-600">Description of feature 2. It can describe another benefit or
                            functionality of your service.</p>
                    </div>
                    <!-- Feature 3 -->
                    <div class="relative bg-gray-50 p-6 rounded-lg shadow-md">
                        <div class="absolute inset-x-0 top-0 -translate-y-1/2 transform text-gray-200">
                            <svg class="h-20 w-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">Feature 3</h3>
                        <p class="mt-4 text-gray-600">Description of feature 3. Explain what sets your directory apart
                            and why users should engage with it.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call-to-Action Section -->
    <section class="relative bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold">Ready to Get Started?</h2>
                <p class="mt-4 text-lg leading-8">Join thousands of businesses and users who are already benefiting from
                    our comprehensive directory. Sign up now to start managing your business or finding new ones!</p>
                <div class="mt-8 flex justify-center">
                    <a href="{{ route('businesses.register') }}"
                        class="inline-block px-6 py-3 text-base font-semibold text-center text-gray-900 bg-yellow-400 rounded-lg hover:bg-yellow-300">Get
                        Started</a>
                </div>
            </div>
        </div>
    </section>
</div>
