{{-- Use the master layout --}}
@extends('layouts.master')

{{-- Browser tab title --}}
@section('title', 'Home')

{{-- Page content (goes into @yield('content') of the master layout) --}}
@section('content')
    <h1>Home Page</h1>

    <h2>{{ __('local.helloUser', ['name' => 'Salman Afzal']) }}</h2>
@endsection
