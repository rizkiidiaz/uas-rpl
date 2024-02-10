@extends('layouts/auth')
<div class="my-20">
    <form action="/product/{{ $product->id }}" method="POST" class="flex flex-col max-w-xl mx-auto gap-5">
        @method('PUT')
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <h1 class="text-center text-4xl font-bold">Edit Produk</h1>
        <input value={{ $product->nama_product }} class="border p-2" type="text" name="nama_product"
            placeholder="Nama Produk">
        @error('nama_product')
            <div class="text-red-500 ">{{ $message }}</div>
        @enderror

        <input value={{ $product->stok_product }} class="border p-2" type="number" name="stok_product"
            placeholder="Stok Produk">
        @error('stok_product')
            <div class="text-red-500 ">{{ $message }}</div>
        @enderror

        <textarea class="border p-2 h-20" name="deskripsi_product" placeholder="Deskripsi Produk">{{ $product->deskripsi_product }}</textarea>
        @error('deskripsi_product')
            <div class="text-red-500 ">{{ $message }}</div>
        @enderror

        <input value={{ $product->harga }} class="border p-2" type="number" name="harga" placeholder="Harga Produk">
        @error('harga')
            <div class="text-red-500 ">{{ $message }}</div>
        @enderror

        <input value={{ $product->url_gambar }} class="border p-2" type="text" name="url_gambar"
            placeholder="URL Gambar">
        @error('url_gambar')
            <div class="text-red-500 ">{{ $message }}</div>
        @enderror

        <input value={{ $product->link_ecommerce }} class="border p-2" type="text" name="link_ecommerce"
            placeholder="URL Produk">
        @error('link_ecommerce')
            <div class="text-red-500 ">{{ $message }}</div>
        @enderror

        <input value={{ $product->kategori_product }} class="border p-2" type="text" name="kategori_product"
            placeholder="Kategori Produk">
        @error('kategori_product')
            <div class="text-red-500 ">{{ $message }}</div>
        @enderror

        <button class="bg-blue-500 text-white p-2 rounded-lg">Update Produk</button>
    </form>

</div>
