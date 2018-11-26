@extends('layouts.app');

@section('content')
    <h1>Posts</h1>
    @if (count($posts) > 0)
        @foreach($posts as $post)
            <div class="well">
                <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                <small>Written on {{ $post->created_at }}</small>
                <hr>
                @if (!Auth::guest())
                    @if (Auth::user()->id == $post->user_id)
                    <a href="/posts/{{ $post->id }}/edit" class="btn btn-default">Edit</a>
                    <form action="{{ action('PostController@destroy',$post->id) }}" method="post" class="pull-right">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Delete</button>  
                    </form>                        
                    @endif                    
                @endif
                {{--  <a href="/posts/{{ $post->id }}/delete" class="btn btn-default">Delete</a>  --}}
            </div>
        @endforeach
        {{ $posts->links() }}
    @else
        <p>No posts found</p>
    @endif
@endsection