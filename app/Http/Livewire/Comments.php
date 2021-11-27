<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
use Livewire\Component;
use App\Models\Comment;

class Comments extends Component
{
    public $comments;
    public $newComment;

    public function mount()
    {
        $initialComments = Comment::latest()->get();
        $this->comments = $initialComments;
    }



    public function render()
    {
        return view('livewire.comments');
    }

    public function updated($field)
    {
        $this->validateOnly($field, ['newComment'=>'required|max:255']);
    }



    public function addComment()
    {
        $this->validate(['newComment'=>'required|max:255']);

        $createdComment = Comment::create(['body'=>$this->newComment, 'user_id'=>1]);
        $this->comments->prepend($createdComment);
        $this->newComment = "";
    }

}
