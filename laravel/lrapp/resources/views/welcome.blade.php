<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
    </head>
    <body>
        <h1>Heyyy</h1>
        {{--  <h3>Welcome {{ $user->number }}</h3>  --}}
        @foreach ($postt->tag as $pp)
            <h2>{{ $pp->title }}</h2>            
        @endforeach
    </body>
</html>
