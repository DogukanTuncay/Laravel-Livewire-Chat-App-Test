<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
class Chat extends Component
{
    public $messages = [];
    public $newMessage;
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
        $this->loadMessages();
    }

    public function render()
    {
        return view('livewire.chat');
    }

    public function sendMessage()
    {


        Message::create([
            'user_id' => $this->user->id,
            'body' => $this->newMessage,
        ]);

        $this->newMessage = ''; // Mesaj gönderildikten sonra input'u temizle
        $this->loadMessages(); // Mesajları güncelle
        $this->dispatch('message-sent'); // Tarayıcı olayını tetikle
    }

    public function loadMessages()
    {
        $this->messages = Message::with('user')->latest()->get();
    }

    protected $listeners = [
        'refreshMessages' => 'loadMessages', // Dinlenilecek olay
    ];
}
