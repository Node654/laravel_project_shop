@extends('layouts.auth')

@section('content')

    @auth
        <form method="post" action="{{ route('auth.logOut') }}">
            @csrf
            @method('DELETE')
            <button type="submit">Выйти</button>
        </form>
    @endauth

@endsection
