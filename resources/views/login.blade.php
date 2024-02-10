@extends('layouts/auth')
<div class="my-20">
    <form action="/login" method="POST" class="flex flex-col max-w-xl mx-auto gap-5">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <h1 class="text-center text-4xl font-bold">Login</h1>
        <input required class="border p-2" type="email" name="email" id="email" placeholder="Email...">
        <input required class="border p-2" type="password" name="password" id="password" placeholder="Password...">

        <button class="bg-blue-500 text-white p-2 rounded-lg">Login</button>

        <p>Belum punya akun ? <a class="text-blue-600" href="/register">Register</a> </p>
    </form>
</div>
