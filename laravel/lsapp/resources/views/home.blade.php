@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    @if (count($posts) > 0)
                        <table class="table table-stripped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</t>
                                <td><a href="/posts/{{ $post->id }}/edit" class="btn btn-default">Edit</a></td>
                                <td></td>
                            </tr>
                            @endforeach
                        </table>                    
                    @else
                        <p>You have No Posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
