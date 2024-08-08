<div x-data="{ open: false, businessId: null, businessName: '' }" class="container mx-auto p-8">
    <h1 class="text-4xl text-center font-extrabold text-gray-900 mb-8">Your Businesses</h1>
    @if (session()->has('message'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
            {{ session('message') }}
        </div>
    @endif
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($businesses as $business)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-all duration-300">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-2">{{ $business->name }}</h2>
                    <p class="text-sm text-gray-500">{{ $business->category }}</p>
                    <p class="mt-4 text-gray-700"><strong>Address:</strong> {{ $business->address }}</p>
                    <p class="text-gray-700"><strong>Phone:</strong> {{ $business->phone }}</p>
                    <p class="text-gray-700"><strong>Website:</strong> <a href="{{ $business->website }}"
                            class="text-blue-600 hover:underline">{{ $business->website }}</a></p>
                    <p class="text-gray-700"><strong>Description:</strong> {{ $business->description }}</p>
                </div>
                <div class="p-6 flex justify-between items-center bg-gray-50">
                    <a class="flex items-center text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg"
                        wire:navigate href="{{ route('business.edit', $business->id) }}">Edit Business</a>
                    <button
                        @click="open = true; businessId = {{ $business->id }}; businessName = '{{ $business->name }}'"
                        class="flex items-center text-white bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Delete Business
                    </button>
                </div>
            </div>
        @endforeach
    </div>
    <div x-show="open" x-cloak class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div @click="open = false" class="fixed inset-0 transition-opacity bg-gray-500 opacity-75"
                aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div x-show="open" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Delete Business
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Are you sure you want to delete the business <strong
                                        x-text="businessName"></strong>?
                                    This action cannot be undone.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
                        @click="
                            open = false;
                            $wire.call('deleteBusinessWithId', businessId);
                        ">
                        Delete
                    </button>
                    <button type="button"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                        @click="open = false">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
