@extends('layouts.app');

@section('content')
    <h1>Contact Us</h1>
    <form action="{{ action('ContactController@store') }}" method="post">
        <div class="form-group">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">  
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="name">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="email">
            <label for="no">Number</label>
            <input type="text" name="no" id="no" class="form-control" placeholder="no">
            <label for="feedback">Feedback</label>
            <textarea name="feedback" class="form-control" placeholder="Feedback"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    {{--  @if (count($posts) > 0)
        @foreach($posts as $post)
            <div class="well">
                <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                <small>Written on {{ $post->created_at }}</small>
            </div>
        @endforeach
        {{ $posts->links() }}
    @else
        <p>No posts found</p>
    @endif  --}}
@endsection