<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-6">Your Appointments</h2>
        <div class="space-y-4">
            @foreach ($appointments as $appointment)
                <div class="p-4 bg-gray-100 rounded-lg shadow">
                    <h3 class="text-xl font-semibold">{{ $appointment->notes }}</h3>
                    <p>Appointed For: {{ $appointment->appointment_time }}</p>
                    <p>Appointment Made At: {{ $appointment->created_at }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
