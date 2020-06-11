<?php

namespace App\Http\Livewire;

use App\SupportTicket;
use Livewire\Component;

class Tickets extends Component
{
    public $active;

    protected $listeners = ['ticketSelected', 'addTicket' => 'displayModal', 'closeModal', 'storeTicket'];

    public $showModal = false;

    public function storeTicket($question){
        $this->closeModal();
        SupportTicket::create(['question'=>$question]);
        session()->flash('ticketMessage', 'Ticket created successfully');
    }

    public function displayModal(){
        $this->showModal = true;
    }

    public function closeModal(){
        $this->showModal = false;
    }

    public function ticketSelected($ticketId){
        $this->active = $ticketId;
    }

    public function render()
    {
        return view('livewire.tickets', [
            'tickets' => SupportTicket::latest()->get()
        ]);
    }
}
