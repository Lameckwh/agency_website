@extends('layouts.app')



@section('content')
    @if (session('success'))
        <div class="flex items-center justify-center relative mt-4">
            <div class="alert alert-success w-96 relative" align="center">
                <span class="block">{{ session('success') }}</span>
                <button class="absolute top-0 right-0 p-2" onclick="removeAlert(this)">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    @endif
    @if (session('danger'))
        <div class="flex items-center justify-center relative mt-4">
            <div class="alert alert-error w-96 relative">
                <span class="block">{{ session('danger') }}</span>
                <button class="absolute top-0 right-0 p-2" onclick="removeAlert(this)">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    @endif

    <div class="flex justify-end flex-row mt-8 gap-4 mb-2 mr-4 sm:mr-16">
        <a href="/news/create" class="inline-block bg-green-700 hover:bg-green-500 text-white py-2 px-4 rounded">
            Add New Post
        </a>

        <a href="/news"
            class="inline-block bg-gradient-to-r from-gray-900 to-blue-950 hover:bg-blue-900 text-white py-2 px-4 rounded">
            Go to News
        </a>

        <!-- Add the "Delete All" button -->
        {{-- <form action="{{ route('news.deleteAll') }}" method="post"
            onsubmit="return confirm('Are you sure you want to delete all posts?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="inline-block bg-red-700 hover:bg-red-500 text-white py-2 px-4 rounded">
                Delete All
            </button>
        </form> --}}
    </div>
    <div class="m-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-4">Posts</h3>
                    @if ($posts->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600">
                                <thead>
                                    <tr>
                                        <th
                                            class="hidden sm:table-cell py-2 px-4 border-b border-l border-gray-300 dark:border-gray-600">
                                            Image</th>
                                        <th class="py-2 px-4 border-b border-l border-gray-300 dark:border-gray-600">Title
                                        </th>
                                        <th class="py-2 px-4 border-b border-l border-gray-300 dark:border-gray-600">Edit
                                        </th>
                                        <th class="py-2 px-4 border-b border-l border-gray-300 dark:border-gray-600">Delete
                                        </th>
                                        <th class="py-2 px-4 border-b border-l border-gray-300 dark:border-gray-600">User
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td
                                                class="hidden sm:table-cell py-2 px-4 border-b border-l border-gray-300 dark:border-gray-600">
                                                @if ($post->image_path)
                                                    <img src="/storage/images/{{ $post->image_path }}"
                                                        alt="{{ $post->title }}" class="w-10 h-10 object-cover">
                                                @else
                                                    <!-- Add a default image or leave it blank based on your design -->
                                                @endif
                                            </td>
                                            <td class="py-2 px-4 border-b border-l border-gray-300 dark:border-gray-600">
                                                <a class="text-blue-400" href="{{ route('news.show', $post->id) }}">
                                                    {{ $post->title }}
                                                </a>
                                            </td>
                                            <td class="py-2 px-4 border-b border-l border-gray-300 dark:border-gray-600">
                                                <a href="{{ route('news.edit', $post->id) }}"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                                                    Edit
                                                </a>
                                            </td>
                                            <td class="py-2 px-4 border-b border-l border-gray-300 dark:border-gray-600">
                                                <a href="{{ route('news.delete', $post->id) }}"
                                                    class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded">
                                                    Delete
                                                </a>
                                            </td>
                                            <td class="py-2 px-4 border-b border-l border-gray-300 dark:border-gray-600">
                                                {{ $post->user->name ?? 'Unknown' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>No posts found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
