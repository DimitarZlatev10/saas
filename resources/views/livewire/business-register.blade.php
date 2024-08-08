<div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
    @if ($isAuthenticated)
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-bold mb-6">Register a New Business</h2>

            @if (session()->has('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit.prevent="register">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Business Name</label>
                    <input type="text" id="name" wire:model="name" class="mt-1 block w-full" autofocus>
                    @error('name')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="address" class="block text-gray-700">Address</label>
                    <input type="text" id="address" wire:model="address" class="mt-1 block w-full">
                    @error('address')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="phone" class="block text-gray-700">Phone</label>
                    <input type="text" id="phone" wire:model="phone" class="mt-1 block w-full">
                    @error('phone')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="website" class="block text-gray-700">Website</label>
                    <input type="text" id="website" wire:model="website" class="mt-1 block w-full">
                    @error('website')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Description</label>
                    <textarea id="description" wire:model="description" class="mt-1 block w-full"></textarea>
                    @error('description')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-gray-700">Category</label>
                    <select id="category" wire:model="category" class="mt-1 block w-full">
                        <option value="">Select a category</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat }}">{{ $cat }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Register</button>
                </div>
            </form>
        </div>
    @else
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-bold mb-6">Access Restricted</h2>
            <p class="mb-4">You need to be logged in to register a business.</p>
            <p class="mb-4">Please <a href="{{ route('login') }}" class="text-blue-500 hover:underline">login</a> or
                <a href="{{ route('register') }}" class="text-blue-500 hover:underline">register</a> to access the
                business registration form.
            </p>
        </div>
    @endif
</div>
