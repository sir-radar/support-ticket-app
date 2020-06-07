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
        $initialComments = Comments::latest()->get();
        $this->comments = $initialComments;
    }

    public function updated($field){
        $this->validateOnly($field, [
            'newComment' => 'required|max:255'
        ]);
    }

    public function render()
    {
        return view('livewire.comment');
    }

    public function addComment(){
       
        $this->validate(
            [
                'newComment' => 'required|max:255'
            ]
        );

       $createdComment = Comments::create(
           [
               'body'=>$this->newComment,
               'user_id'=>1
            ]
        );
       $this->comments->prepend($createdComment);
       $this->newComment = '';
    }

    public function remove($commentId){
        $comment = Comments::find($commentId);
        $comment->delete();
        $this->comments = $this->comments->except($commentId);
    }
}
