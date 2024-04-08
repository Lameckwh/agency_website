<!-- edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <form action="{{ route('news.update', $post->id) }}" method="POST" enctype="multipart/form-data"
            class="w-full max-w-lg mx-auto">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                <input type="text" name="title" id="title"
                    class="appearance-none border rounded w-full py-2 px-3 
                    text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    value="{{ old('title', $post->title) }}" required>
                @error('title')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="excerpt" class="block text-gray-700 text-sm font-bold mb-2">Excerpt</label>
                <textarea name="excerpt" id="excerpt" rows="3"
                    class="appearance-none border rounded w-full py-2 px-3 
                    text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('excerpt', $post->excerpt) }}</textarea>
                @error('excerpt')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="editor" class="block text-gray-700 text-sm font-bold mb-2">Body</label>
                <textarea name="body" id="editor" rows="6"
                    class="appearance-none border rounded w-full py-2 px-3 
                    text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>{{ old('body', $post->body) }}</textarea>
                @error('body')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="min_to_read" class="block text-gray-700 text-sm font-bold mb-2">Minutes to Read</label>
                <input type="number" name="min_to_read" id="min_to_read"
                    class="appearance-none border rounded w-full py-2 px-3 
                    text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    value="{{ old('min_to_read', $post->min_to_read) }}" required>
                @error('min_to_read')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
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
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
