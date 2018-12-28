@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Vue Avatar</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if (count($errors))
                    @foreach ($errors->all() as $error)
                    <span class="text-danger">{{ $error }}</span>
                    @endforeach
                    @endif
                    <avatar-editor :user="{{ auth()->user() }}"></avatar-editor>
                    {{--  <vue-croppie ref=croppieRef :enableOrientation="true" :mouseWheelZoom="false" :viewport="{ width: 200, height: 200, type: 'circle' }">
                    </vue-croppie>  --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
