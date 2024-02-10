@extends('layouts/auth')
<div class="my-10">
    <h1 class="text-3xl font-bold mb-5">List product</h1>

    <table class="items-center bg-transparent w-full border-collapse ">
        <thead>
            <tr>
                <th
                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                    ID
                </th>
                <th
                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                    Nama produk
                </th>
                <th
                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                    Gambar
                </th>
                <th
                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                    Stok
                </th>
                <th
                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                    Deskripsi
                </th>
                <th
                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                    Harga
                </th>
                <th
                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                    Kategori
                </th>
                <th
                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                    Aksi
                </th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                        {{ $product->id }}
                    </th>
                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                        {{ $product->nama_product }}
                    </td>
                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                        <img src={{ $product->url_gambar }} class="w-20 h-20 object-cover" />
                    </td>
                    <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                        {{ $product->stok_product }}
                    </td>
                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs p-4 max-w-md line-clamp-2">
                        {{ $product->deskripsi_product }}
                    </td>
                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                        {{ $product->harga }}
                    </td>
                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                        {{ $product->kategori_product }}
                    </td>
                    <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 flex items-center gap-2">
                        <a href="/product/{{ $product->id }}/edit"
                            class="text-white bg-blue-600 p-2 inline-block mb-2 rounded">Edit</a>
                        <form class="inline-block" method="POST" action="/product/{{ $product->id }}">
                            @method('DELETE')
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <button type="submit" class="text-white bg-red-600 p-2 inline rounded">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

</div>
