<div class="chat-container">
    <div>
        @foreach ($messages as $message)
            <div class="chat-message">
                <strong>{{ $message->user->name }}:</strong> {{ $message->body }}
            </div>
        @endforeach
    </div>

    <div>
        <form wire:submit.prevent="sendMessage">
            <input type="text" wire:model="newMessage">
            @error('newMessage') <span class="error">{{ $message }}</span> @enderror
            <button type="submit">Send</button>
        </form>
    </div>

</div>
