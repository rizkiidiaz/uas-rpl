@extends('layouts/auth')
<div class="my-20">
    <form action="/register-seller" method="POST" class="flex flex-col max-w-xl mx-auto gap-5">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <h1 class="text-center text-4xl font-bold">Register Product owner</h1>
        <p class="text-center">Daftarkan diri anda menjadi seorang pemilik produk.</p>

        <button class="bg-blue-600 p-2 rounded-lg text-white" type="submit">Daftar sekarang</button>
    </form>

</div>
