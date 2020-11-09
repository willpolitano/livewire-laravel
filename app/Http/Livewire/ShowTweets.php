<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class ShowTweets extends Component
{
    use WithPagination;

    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];

    public $content = 'Um teste de mensagem!';

    public function render()
    {
        $tweets = Tweet::with('user')->latest()->paginate(3);

        return view('livewire.show-tweets', [
            'tweets' => $tweets
        ]);
    }

    public function create(Request $request)
    {
        $this->validate();

        auth()->user()->tweets()->create([
            'content' => $this->content
        ]);

        $this->content = '';
    }
}
