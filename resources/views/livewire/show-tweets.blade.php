<div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
      </form>

      <br><br>
    <p>{{ $content }}</p>

    <form method="post" wire:submit.prevent="create">
        <input type="text" name="content" id="content" wire:model="content">
        @error('content') {{ $message }} @enderror
        <button type="submit">Criar Tweet</button>
    </form>

    <hr>

    @foreach ($tweets as $tweet)
        {{ $tweet->user->name }} - {{ $tweet->content }}
        <br>
    @endforeach

    <hr>

    {{ $tweets->links("pagination::bootstrap-4") }}
</div>
