<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Comment as Comments;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class Comment extends Component
{
    use WithPagination;
    
    public $newComment;
    public $image;

    protected $listeners = ['fileUpload' => 'handleFileUpload'];

    public function handleFileUpload($imageFile){
        $this->image = $imageFile;
    }

    public function storeImage(){
        if(!$this->image) return null;
        $img = ImageManagerStatic::make($this->image)->encode('jpg');
        $name = Str::random() . '.jpg';
        Storage::disk('public')->put($name, $img);
        return $name;
    }

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
        $image = $this->storeImage();
        Comments::create(
            [
                'body' => $this->newComment,
                'user_id' => 1,
                'image' => $image
            ]
            );
       $this->newComment = '';
       $this->image = '';
       session()->flash('message', 'Comment added successfully :)');
    }

    public function remove($commentId){
        $comment = Comments::find($commentId);
        Storage::disk('public')->delete($comment->image);
        $comment->delete();
        session()->flash('message', 'Comment deleted successfully :)');
    }
}
