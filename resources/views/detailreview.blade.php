@extends('layouts/auth')
<div class="my-20">
    <form action="/review/{{ $review->id }}" method="POST" class="flex flex-col max-w-xl mx-auto gap-5">
        @method('PUT')
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <h1 class="text-center text-4xl font-bold">Edit Review</h1>

        <select name="rating" id="rating" class="p-2">
            <option selected="selected" value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <textarea class="border p-2" name="text" placeholder="Review...">{{ $review->text }}</textarea>

        @error('text')
            <div class="text-red-500 ">{{ $message }}</div>
        @enderror

        <button class="bg-blue-500 text-white p-2 rounded-lg">Update Review</button>
    </form>

</div>
