<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Business;
use Illuminate\Support\Facades\Auth;

class EditBusiness extends Component
{
    public $business;
    public $name;
    public $category;
    public $address;
    public $phone;
    public $website;
    public $description;

    public $categories = [
        'Barber Shop',
        'Massage Salon',
        'Beauty Salon',
        'Hair Stylist',
        'Cosmetician',
    ];

    public function mount($businessId)
    {
        $this->business = Business::where('id', $businessId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $this->name = $this->business->name;
        $this->category = $this->business->category;
        $this->address = $this->business->address;
        $this->phone = $this->business->phone;
        $this->website = $this->business->website;
        $this->description = $this->business->description;
    }

    public function updateBusiness()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:Barber Shop,Massage Salon,Beauty Salon,Hair Stylist,Cosmetician',
            'address' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'website' => 'nullable|url|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $this->business->update([
            'name' => $this->name,
            'category' => $this->category,
            'address' => $this->address,
            'phone' => $this->phone,
            'website' => $this->website,
            'description' => $this->description,
        ]);

        session()->flash('message', "{$this->name} updated successfully.");

        return redirect()->route('user.businesses');
    }

    public function render()
    {
        return view('livewire.edit-business')->layout('layouts.app');
    }
}
