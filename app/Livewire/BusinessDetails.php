<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Business;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class BusinessDetails extends Component
{
    public $business;
    public $appointment_time;
    public $notes;

    public function mount(Business $business)
    {
        $this->business = $business;
    }

    protected $rules = [
        'appointment_time' => 'required|date|after:now',
        'notes' => 'nullable|string',
    ];

    public function bookAppointment()
    {
        $this->validate();

        Appointment::create([
            'business_id' => $this->business->id,
            'user_id' => Auth::id(),
            'appointment_time' => $this->appointment_time,
            'notes' => $this->notes,
        ]);

        session()->flash('message', 'Appointment booked successfully.');

        return redirect()->route('businesses.show', $this->business);
    }

    public function render()
    {
        return view('livewire.business-details')->layout('layouts.app');
    }
}
