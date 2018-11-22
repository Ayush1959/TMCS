@extends('layouts.app')

@section('content')
<h1>{{ $title }}</h1>
@if (count($serve) > 0)
    <ul class="list-group">
    @foreach ($serve as $item)
        <li class="list-group-item">{{ $item }}</li>
    @endforeach
    </ul>
@endif
@endsection