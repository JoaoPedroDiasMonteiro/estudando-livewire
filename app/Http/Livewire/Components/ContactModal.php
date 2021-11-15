<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class ContactModal extends Component
{
    public $name;
    public $email;
    public $phone;
    public $message;

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        'phone' => 'required',
        'message' => 'required',
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function submit()
    {
        $this->validate();

        // send email
        // ...

        $this->reset();
    }

    public function render()
    {
        return view('livewire.components.contact-modal');
    }
}
