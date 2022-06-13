    <h4>{{ $topic->title }}</h4> <small>{{$topic->created_at->diffForHumans()}}</small>
    @foreach($topic->posts as $post)
        <p>{{ $post->body }} - {{ $post->user->name }}</p>
    @endforeach

