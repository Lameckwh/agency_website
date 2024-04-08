<!-- show.blade.php -->

@include('layouts.header')


{{-- Display image as background  --}}
<div class="bg-white">
    <div class="featured-post bg-cover bg-center h-96 relative "
        style="background-image: url('/storage/images/{{ $post->image_path }}');">

        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="absolute bottom-0 flex flex-col items-end right-0 p-6">
            <h2 class="text-xl md:text-2xl lg:text-4xl font-bold text-white uppercase">{{ $post->title }}</h2>
        </div>
    </div>
</div>


<div class="container mx-auto bg-gray-200 mt-3 w-full flex flex-row justify-between">
    <h3 class='text-gray-900 font-medium text-base ml-2 md:text-lg lg:text-xl'>
        News and Features | <a href="/news" class="text-blue-500 font-medium text-base">KC News Archives</a> | <a
            href="{{ route('news.show', $post->id) }}"
            class="text-blue-500 font-medium text-base">{{ $post->title }}</a>
    </h3>
    @if (auth()->check() && auth()->user()->usertype == 'admin')
        <div class="flex gap-4 h-10">
            <a href="{{ route('news.edit', $post->id) }}"
                class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                Edit
            </a>
            <a href="{{ route('news.delete', $post->id) }}"
                class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded">
                Delete
            </a>
        </div>
    @endif


</div>

{{-- Display the full story --}}
<div class="mt-4 bg-white p-4">
    <div class="container mx-auto">
        <p class="text-gray-900 text-normal font-normal ">{!! $post->body !!}</p>
    </div>
</div>
<livewire:comments :model="$post" />



@include('layouts.footer')
