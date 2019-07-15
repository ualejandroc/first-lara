@extends('layouts.content')

@section('content')
@parent
<h1>{{$user}} <h1>
<small>
Cuerpo de la pagina
</small>

{{-- <a href="{{ action('FooController@method') }}">¡Aprieta aquí!</a> --}}

@endsection