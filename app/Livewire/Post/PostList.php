<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class PostList extends Component
{
    public $keyword;
    public function render()
    {
        $posts = $this->getData();
        return view('livewire.post.post-list', compact('posts'));
    }
    public function getData()
    {
        $data = Post::where('title', 'like', '%' . $this->keyword . '%')->paginate(12);
        return $data;
    }
    public function deletePost($id)
    {
        $post = Post::find($id);
        if(!empty($post)){
            $post->delete();
            session()->flash('msg', __('Post Deleted Successfully'));
            session()->flash('alert', 'success');
        }else{
            session()->flash('msg', __('Post nggak ketemu nih'));
            session()->flash('alert', 'danger');
        }
    }
}
