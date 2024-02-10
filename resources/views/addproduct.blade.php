@extends('layouts/auth')
<div class="my-20">
    <form action="/product-add" method="POST" class="flex flex-col max-w-xl mx-auto gap-5">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <h1 class="text-center text-4xl font-bold">Tambah Produk</h1>

        <input class="border p-2" type="text" name="nama_product" placeholder="Nama Produk">
        @error('nama_product')
            <div class="text-red-500 ">{{ $message }}</div>
        @enderror

        <input class="border p-2" type="number" name="stok_product" placeholder="Stok Produk">
        @error('stok_product')
            <div class="text-red-500 ">{{ $message }}</div>
        @enderror

        <textarea class="border p-2" name="deskripsi_product" placeholder="Deskripsi Produk"></textarea>
        @error('deskripsi_product')
            <div class="text-red-500 ">{{ $message }}</div>
        @enderror

        <input class="border p-2" type="number" name="harga" placeholder="Harga Produk">
        @error('harga')
            <div class="text-red-500 ">{{ $message }}</div>
        @enderror

        <input class="border p-2" type="text" name="url_gambar" placeholder="URL Gambar">
        @error('url_gambar')
            <div class="text-red-500 ">{{ $message }}</div>
        @enderror

        <input class="border p-2" type="text" name="link_ecommerce" placeholder="URL Produk">
        @error('link_ecommerce')
            <div class="text-red-500 ">{{ $message }}</div>
        @enderror

        <input class="border p-2" type="text" name="kategori_product" placeholder="Kategori Produk">
        @error('kategori_product')
            <div class="text-red-500 ">{{ $message }}</div>
        @enderror

        <button class="bg-blue-500 text-white p-2 rounded-lg">Tambah Produk</button>
    </form>

</div>
