<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;

class Comment extends Component
{
    public $comments = [
        [
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae deleniti quod laboriosam. Vel, a unde? 
            Illum facere nostrum reprehenderit exercitationem numquam accusantium dolorem, dolore, esse similique aperiam cum. Excepturi, aliquam?',
            'created_at' => '3 min ago',
            'creator' => 'Samson'
        ]

    ];

    public $newComment;

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
    }
}
