<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddTicket extends Component
{
    public $question = '';

    public function submit(){
        if(!$this->question) return;
        $this->emit('storeTicket', $this->question);
    }

    public function render()
    {
        return view('livewire.add-ticket');
    }
}
