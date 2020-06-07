<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;

class Comment extends Component
{
    public $comments;

    public $newComment;

    public function mount($initialComents){
        $this->comments = $initialComents;
    }

    public function render()
    {
        return view('livewire.comment');
    }

    public function addComment(){
        $this->comments[] = [
            'body' => $this->newComment,
            'created_at' => Carbon::now()->diffForHumans(),
            'creator' => 'Samson'
        ];
        $this->newComment = '';
    }
}
