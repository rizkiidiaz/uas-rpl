@extends('layouts/auth')
<div class="my-20">
    <form action="/register" method="POST" class="flex flex-col max-w-xl mx-auto gap-5">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <h1 class="text-center text-4xl font-bold">Register</h1>
        <input class="border p-2" type="email" name="email" id="email" placeholder="Email...">
        @error('email')
            <div class="text-red-500 ">{{ $message }}</div>
        @enderror

        <input class="border p-2" type="text" name="nama_depan" placeholder="Nama depan...">
        @error('namaDepan')
            <div class="text-red-500 ">{{ $message }}</div>
        @enderror

        <input class="border p-2" type="text" name="nama_belakang" placeholder="Nama belakang...">
        @error('namaBelakang')
            <div class="text-red-500 ">{{ $message }}</div>
        @enderror

        <input class="border p-2" type="text" name="username" placeholder="Username...">
        @error('username')
            <div class="text-red-500 ">{{ $message }}</div>
        @enderror

        <input class="border p-2" type="text" name="telepon" placeholder="Nomor telepon...">
        @error('telepon')
            <div class="text-red-500 ">{{ $message }}</div>
        @enderror

        <textarea class="border p-2" name="alamat" placeholder="Alamat..."></textarea>
        @error('alamat')
            <div class="text-red-500 ">{{ $message }}</div>
        @enderror

        <input class="border p-2" type="password" name="password" id="password" placeholder="Password...">
        @error('password')
            <div class="text-red-500 ">{{ $message }}</div>
        @enderror

        <input class="border p-2" type="password" name="password_confirmation" id="password-confirmation"
            placeholder="Password Confirmation...">

        @error('password_confirmation')
            <div class="text-red-500 ">{{ $message }}</div>
        @enderror

        <button class="bg-blue-500 text-white p-2 rounded-lg">Login</button>

        <p>Sudah punya akun ? <a class="text-blue-600" href="/login">Login</a> </p>
    </form>

</div>
