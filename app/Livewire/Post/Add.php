<?php

namespace App\Livewire\Post;

use Livewire\Component;
use App\Models\Post;

class Add extends Component
{
    public $title;
    public $content;
    public function render()
    {
        return view('livewire.post.add');
    }
    public function save()
    {
        $input = $this->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $post = new Post();
        $post->title = $this->title;
        $post->content = $this->content;
        try {
            $post->save();
            $this->reset();
            session()->flash('msg', __('Post saved Successfully'));
            session()->flash('alert', 'success');
        } catch (\Throwable $th) {
            session()->flash('msg', $th);
            session()->flash('alert', 'danger');
        }
    }
}
