@extends('layouts.auth')

@section('title', 'Забыли пароль')
@section('content')
    <x-forms.auth-forms title="Забыли пароль" action="" method="POST">
        @csrf

        <x-forms.text-input name="name" placeholder="E-Email" type="email" required="true" :isError="$errors->has('email')"/>

        @error('email')
            <x-forms.error>
                {{ $message }}
            </x-forms.error>
        @enderror

        <x-forms.primary-button>Отправить</x-forms.primary-button>

        <x-slot:buttons>
            <div class="space-y-3 mt-5">
                <div class="text-xxs md:text-xs"><a href="{{ route('auth.login') }}" class="text-white hover:text-white/70 font-bold">Вспомнили пароль</a></div>
            </div>
        </x-slot:buttons>
    </x-forms.auth-forms>
@endsection

