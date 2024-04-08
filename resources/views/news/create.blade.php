@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 pb-8 ">
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data"
            class="w-full max-w-lg mx-auto bg-blend-lighten md:bg-blend-darken" novalidate>
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                <input type="text" name="title" id="title"
                    class="appearance-none border rounded w-full py-2 px-3 
                    text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
                @error('title')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="excerpt" class="block text-gray-700 text-sm font-bold mb-2">Excerpt</label>
                <textarea name="excerpt" id="excerpt" rows="3"
                    class="appearance-none border rounded w-full py-2 px-3 
                    text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                @error('excerpt')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="editor" class="block text-gray-700 text-sm font-bold mb-2">Body</label>
                <textarea name="body" id="editor" rows="6"
                    class="appearance-none border rounded w-full py-2 px-3 
                    text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required></textarea>
                @error('body')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="min_to_read" class="block text-gray-700 text-sm font-bold mb-2">Minutes to Read</label>
                <input type="number" name="min_to_read" id="min_to_read"
                    class="appearance-none border rounded w-full py-2 px-3 
                    text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
                @error('min_to_read')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image_path" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                <input type="file" name="image_path" id="image_path"
                    class="appearance-none border rounded w-full py-2 px-3 
                    text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('image')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Save
                </button>
            </div>
        </form>
    </div>
@endsection
