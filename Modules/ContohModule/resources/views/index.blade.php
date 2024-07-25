@extends('contohmodule::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('contohmodule.name') !!}</p>
@endsection
