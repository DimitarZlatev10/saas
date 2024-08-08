<div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-6">{{ $business->name }}</h2>
        <p class="text-gray-700 mb-4">{{ $business->address }}</p>
        <p class="text-gray-700 mb-4">{{ $business->phone }}</p>
        <p class="text-gray-700 mb-4">{{ $business->website }}</p>
        <p class="text-gray-700 mb-4">{{ $business->description }}</p>

        <h3 class="text-xl font-bold mt-6 mb-4">Services</h3>
        <ul class="list-disc pl-5">
            @foreach ($business->services as $service)
                <li>{{ $service->name }} - ${{ $service->price }}</li>
            @endforeach
        </ul>

        <h3 class="text-xl font-bold mt-6 mb-4">Ratings</h3>
        @foreach ($business->ratings as $rating)
            <div class="mb-4">
                <p class="text-gray-700">{{ $rating->user->name }} rated {{ $rating->rating }} out of 5</p>
            </div>
        @endforeach

        <h3 class="text-xl font-bold mt-6 mb-4">Comments</h3>
        @foreach ($business->comments as $comment)
            <div class="mb-4">
                <p class="text-gray-700">{{ $comment->user->name }}:</p>
                <p class="text-gray-700">{{ $comment->comment }}</p>
            </div>
        @endforeach

        <h3 class="text-xl font-bold mt-6 mb-4">Book an Appointment</h3>
        <form wire:submit.prevent="bookAppointment">
            <div class="mb-4">
                <label for="appointment_time" class="block text-gray-700">Appointment Time</label>
                <input type="datetime-local" id="appointment_time" wire:model="appointment_time"
                    class="mt-1 block w-full">
                @error('appointment_time')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="notes" class="block text-gray-700">Notes</label>
                <textarea id="notes" wire:model="notes" class="mt-1 block w-full"></textarea>
                @error('notes')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Book
                    Appointment</button>
            </div>
        </form>
    </div>
</div>
