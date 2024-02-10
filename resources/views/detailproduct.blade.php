@extends('layouts/main')

@section('content')
    <div class="flex flex-row px-2 py-4 gap-4">
        <div class="max-w-md">
            <img class="size-full object-cover" src={{ $product->url_gambar }} />
        </div>

        <div class="flex flex-col gap-5">
            <p class="text-4xl font-semibold text-neutral-900">{{ $product->nama_product }}</p>
            <p class="line-clamp-4 text-md text-neutral-600">{{ $product->deskripsi_product }}</p>
            <p class="text-lg font-medium">Rp.{{ $product->harga }}</p>

            <p class="text-neutral-800">Nama Toko : {{ $user }}</p>
            <a class="text-blue-800" href={{ $product->link_ecommerce }} target="_blank">Link toko online</a>
        </div>

    </div>

    <p class="text-xl font-bold my-5">List review</p>
    @if (sizeof($reviews) === 0)
        <p class="mb-5 text-neutral-700">Belum ada review untuk produk ini !</p>
    @else
        @foreach ($reviews as $review)
            <div class="border my-5 rounded-lg shadow-md p-3 flex items-center justify-between">
                <div>
                    <p class="mb-2 text-lg font-semibold capitalize">{{ $review->user->username }}</p>
                    <p>{{ $review->text }}</p>
                    <div class="flex items-center gap-2 mt-2">
                        @foreach (range(1, $review->rating) as $rating)
                            <img src="/star.jpg" class="size-5 object-cover" />
                        @endforeach
                    </div>
                </div>

                @if (auth()?->user()?->id === $review->user->id)
                    <div class="flex gap-4">
                        <a href={{ '/review/' . $review->id }} class="text-blue-800">Edit</a>
                        <form action="/review/{{ $review->id }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="productId" value="{{ $product->id }}" />
                            @method('DELETE')
                            <button class="text-red-800" type="submit">Hapus</button>
                        </form>

                    </div>
                @endif
            </div>
        @endforeach
    @endif
    <form class="flex flex-col gap-2" action={{ '/review/' . $product->id }} method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <select name="rating" id="rating" class="p-2">
            <option selected="selected" value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <label for="content">Tambahkan ulasan anda</label>
        <textarea required class="border border-neutral-600 rounded-lg min-h-36 p-2" name="content" id="content"></textarea>

        <button type="submit" class="bg-blue-600 p-2 text-white rounded-lg">Tambah Ulasan</button>

    </form>
@endsection
