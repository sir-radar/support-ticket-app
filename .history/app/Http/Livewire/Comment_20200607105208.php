<?php

namespace App\Http\Livewire;

use App\Comment;
use Livewire\Component;
use Illuminate\Support\Carbon;

class Comment extends Component
{
    public $comments;

    public $newComment;

    public function mount(){
        $initialComments = Comment::all();
        $this->comments = $initialComments;
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
