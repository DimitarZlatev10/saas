<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Business;
use Illuminate\Support\Facades\Auth;

class BusinessRegister extends Component
{
    public $name;
    public $address;
    public $phone;
    public $website;
    public $description;
    public $category;

    protected $rules = [
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'website' => 'nullable|url|max:255',
        'description' => 'nullable|string',
        'category' => 'required|string|in:Barber Shop,Massage Salon,Beauty Salon,Hair Stylist,Cosmetician',
    ];

    public function register()
    {
        if (!Auth::check()) {
            session()->flash('error', 'You need to be logged in to register a business.');
            return redirect()->route('login');
        }

        $this->validate();

        Business::create([
            'user_id' => Auth::id(),
            'name' => $this->name,
            'address' => $this->address,
            'phone' => $this->phone,
            'website' => $this->website,
            'description' => $this->description,
            'category' => $this->category,
        ]);

        session()->flash('message', "Business {$this->name} registered successfully.");

        return redirect()->route('user.businesses');
    }

    public function render()
    {
        return view('livewire.business-register', [
            'isAuthenticated' => Auth::check(),
            'categories' => $this->getCategories(), // Pass categories to the view
        ])->layout('layouts.app');
    }

    public function getCategories()
    {
        return [
            'Barber Shop',
            'Massage Salon',
            'Beauty Salon',
            'Hair Stylist',
            'Cosmetician',
        ];
    }
}
