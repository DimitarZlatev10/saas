<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-6">Businesses</h2>

        <div class="mb-4">
            <input type="text" wire:model="search" class="mt-1 block w-full" placeholder="Search businesses...">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($businesses as $business)
                <div class="bg-gray-100 p-4 rounded-lg shadow">
                    <h3 class="text-xl font-bold mb-2">{{ $business->name }}</h3>
                    <p class="text-gray-700 mb-2">{{ $business->address }}</p>
                    <p class="text-gray-700 mb-2">{{ $business->phone }}</p>
                    <a href="{{ route('businesses.show', $business) }}" class="text-blue-500 hover:underline">View
                        Details</a>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $businesses->links() }}
        </div>
    </div>
</div>
