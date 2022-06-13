@foreach($topics as $topic)
    <h4>{{ $topic->title }}</h4>
    @foreach($topic->posts as $post)
        <p>{{ $post->body }} - {{ $post->user->name }}</p>
    @endforeach
@endforeach
