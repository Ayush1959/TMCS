@extends('layouts.apphome')

@section('content')
<div class="row">
    <router-view name="DataIndex"></router-view>
    <router-view></router-view>
    {{--  <task></task>  --}}
    </div>
@endsection
