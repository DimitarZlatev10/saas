<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class UserAppointments extends Component
{
    public function render()
    {
        $appointments = Appointment::where('user_id', Auth::id())->get();
        return view('livewire.user-appointments', ['appointments' => $appointments])->layout('layouts.app');;
    }
}
