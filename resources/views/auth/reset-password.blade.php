@extends('layouts.auth')

@section('title', 'Восстановить пароль')
@section('content')
    <x-forms.auth-forms title="Восстановить пароль" action="" method="POST">
        @csrf

        <x-forms.text-input name="name" placeholder="E-Email" type="email" required="true" :isError="$errors->has('email')"/>

        @error('email')
            <x-forms.error>
                {{ $message }}
            </x-forms.error>
        @enderror

        <x-forms.text-input name="password" type="password" placeholder="Password" required="true" :isError="$errors->has('password')" />

        @error('password')
        <x-forms.error>
            {{ $message }}
        </x-forms.error>
        @enderror

        <x-forms.text-input name="password_confirmation" type="password" placeholder="Confirm password" required="true" :isError="$errors->has('password_confirmation')" />

        @error('password_confirmation')
        <x-forms.error>
            {{ $message }}
        </x-forms.error>
        @enderror

        <x-forms.primary-button>Обновить пароль</x-forms.primary-button>

        <x-slot:buttons></x-slot:buttons>
    </x-forms.auth-forms>
@endsection

