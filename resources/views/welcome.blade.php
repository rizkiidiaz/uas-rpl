@extends('layouts/main')

@section('content')
    @auth
        <p class="text-xl font-bold my-5">Welcome back userrrr !</p>
    @endauth

    <div class="grid grid-cols-5 gap-5">
        @foreach ($products as $product)
            <article class="flex flex-col px-2  py-4 gap-2 shadow-md rounded-lg">
                <img class="size-full object-cover" src={{ $product->url_gambar }} />

                <p class="text-lg font-semibold text-neutral-900">{{ $product->nama_product }}</p>
                <p class="line-clamp-4 text-sm text-neutral-600">{{ $product->deskripsi_product }}</p>
                <p>Rp.{{ $product->harga }}</p>

                <a class="text-xs text-blue-600 underline" href={{ '/product/' . $product->id }}>Lihat selengkapnya</a>

            </article>
        @endforeach
    </div>
@endsection
