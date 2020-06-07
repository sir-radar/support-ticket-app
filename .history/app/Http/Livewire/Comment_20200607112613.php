<?php

namespace App\Http\Livewire;

use App\Comment as Comments;
use Livewire\Component;
use Illuminate\Support\Carbon;

class Comment extends Component
{
    public $comments;

    public $newComment;

    public function mount(){
        $initialComments = Comments::all();
        $this->comments = $initialComments;
    }

    public function render()
    {
        return view('livewire.comment');
    }

    public function addComment(){
       if($this->newComment == ''){
           return;
       }

       $createdComment = Comments::create(
           [
               'body'=>$this->newComment,
               'user_id'=>1
            ]
        );
       $this->comments->push($createdComment);
       $this->newComment = '';
    }
}
