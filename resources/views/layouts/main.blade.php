<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Laravel</title>

    <!-- Fonts -->
    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body class="antialiased max-w-4xl mx-auto">
    <nav class="flex bg-neutral-200 p-3 justify-between gap-10 items-center">
        <a href="/">Home</a>
        <form action="/search">
            <input value="{{ Request::get('q') ? Request::get('q') : null }}" placeholder="Search Product" name="q"
                class="border p-2 min-w-36" />
        </form>
        @auth
            @if (auth()->user()->role != 'seller')
                <a class="text-blue-600 underline" href={{ url('register-seller') }}>
                    <button>Daftar jadi seller !</button>
                </a>
            @else
                <a class="text-blue-600 underline" href='/product-add'>
                    <button>Tambah produk</button>
                </a>
                <a class="text-blue-600 underline" href='/product'>
                    <button>List product</button>
                </a>
            @endif

            <a class="text-blue-600 underline" href={{ url('logout') }}>
                <button>Logout</button>
            </a>
        @endauth

        @guest
            <div>
                <a class="text-blue-600 underline" href={{ url('login') }}>
                    <button>Login</button>
                </a>
                <a class="text-blue-600 underline" href={{ url('register') }}>
                    <button>Register</button>
                </a>
            </div>
        @endguest
    </nav>
    <div class="pb-20 py-5">

        @yield('content')

    </div>
</body>

</html>
