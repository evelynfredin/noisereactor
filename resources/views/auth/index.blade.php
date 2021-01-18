@extends('layout.main')
@section('content')

<section class="flex justify-center">
    <div class="bg-gray-100 p-10 w-full md:max-w-lg shadow-sm">
        <h3 class="heading--3">Login to your account</h3>

        @if(session('status'))
        <div class="bg-red-600 text-white text-center p-3 mb-5">
            {{ session('status') }}
        </div>
        @endif

        <form action="{{ route('login') }}" method="post">
            @csrf

            <div>
                <label class="block" for="email">Email:</label>
                <input class="input @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email') }}">

                @error('email')
                <div class="bg-red-600 text-white text-center p-3 mb-5">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div>
                <label class="block" for="password">Password:</label>
                <input class="input @error('password') is-invalid @enderror" type="password" name="password" id="password">

                @error('password')
                <div class="bg-red-600 text-white text-center p-3 mb-5">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="flex mb-5 h-auto items-center">
                <input type="checkbox" name="remember" id="remember">
                <label class="ml-3" for="remember">Remember me</label>
            </div>

            <button class="btn bg-blue-500 hover:bg-gray-700" type="submit">Sign in</button>
        </form>
    </div>
</section>

@endsection
