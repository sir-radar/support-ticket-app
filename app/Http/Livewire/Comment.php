<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Comment as Comments;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;

class Comment extends Component
{
    use WithPagination;
    
    public $newComment;

    public function updated($field){
        $this->validateOnly($field, [
            'newComment' => 'required|max:255'
        ]);
    }

    public function render()
    {
        return view('livewire.comment',[
            'comments' => Comments::latest()->paginate(2)
        ]);
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
       $this->newComment = '';
       session()->flash('message', 'Comment added successfully :)');
    }

    public function remove($commentId){
        $comment = Comments::find($commentId);
        $comment->delete();
        session()->flash('message', 'Comment deleted successfully :)');
    }
}
