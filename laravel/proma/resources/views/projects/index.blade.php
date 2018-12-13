@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="panel-heading">Projects</div>
            <router-view name="DataCreate"></router-view>
            <router-view></router-view>        
    </div>
@endsection
