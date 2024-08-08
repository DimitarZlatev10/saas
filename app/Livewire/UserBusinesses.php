<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Business;
use Illuminate\Support\Facades\Auth;

class UserBusinesses extends Component
{
    public $businesses;

    public function mount()
    {
        $this->businesses = Business::with(['appointments', 'comments', 'ratings', 'services'])
            ->where('user_id', Auth::id())
            ->get();
    }

    public function deleteBusiness($businessId)
    {
        $business = Business::where('id', $businessId)
            ->where('user_id', Auth::id())
            ->first();

        if ($business) {
            $business->delete();
            $this->businesses = $this->businesses->filter(function ($b) use ($businessId) {
                return $b->id !== $businessId;
            });
            session()->flash('message', "{$business->name} deleted successfully.");
        } else {
            session()->flash('error', 'Business not found or unauthorized.');
        }
    }

    public function render()
    {
        return view('livewire.user-businesses')->layout('layouts.app');
    }
}
