<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $comments = [
[        'body'=>'comment test',
        'creator'=>'Stanislav',
        'created_at'=>'3min ago',]
    ];
    public $newComment;

    public function render()
    {
        return view('livewire.comments');
    }


    public function addComment()
    {
        array_unshift($this->comments, [
            'body' => $this->newComment,
            'creator' => 'Stanislav',
            'created_at' => Carbon::now()->diffForHumans(),
        ]);
        $this->newComment = "";
    }

}
