@include('layouts.header')

{{-- Display the first post as a featured section --}}

@if ($posts->isNotEmpty())
    <!-- Featured Post Section -->
    <div class="featured-post bg-cover bg-center h-64 md:h-[500px] lg:h-[500px] relative"
        style="background-image: url('/storage/images/{{ $posts[0]->image_path }}');">
        <!-- Background Overlay -->
        <div class="absolute inset-0 bg-black opacity-60"></div>
        <!-- Post Details -->
        <div class="absolute bottom-0 right-0 p-6 flex flex-col items-end">
            <h2 class="text-xl md:text-2xl lg:text-4xl font-bold text-white right-0 uppercase">{{ $posts[0]->title }}
            </h2>
            <div class="flex items-end flex-row gap-4">
                <p class="text-gray-300 font-semibold text-base mb-2">{{ $posts[0]->created_at->format('M d, Y') }}</p>
                <a href="{{ route('news.show', $posts[0]->id) }}"
                    class="mt-2 inline-block px-4 py-2 bg-blue-500 text-white font-semibold text-base hover:bg-orange-400 transition duration-200">
                    Read More
                </a>
            </div>
        </div>
    </div>

    <!-- News and Features Section -->
    <div class="container mx-auto bg-gray-200 mt-3 w-full">
        <h3 class='text-gray-900 font-medium text-base ml-2 md:text-lg lg:text-xl'>News and Features | <a href="/news"
                class="text-blue-500 font-medium text-lg">News</a> </h3>
    </div>

    {{-- Display other posts in a grid --}}
    <div class="bg-white p-4 mt-4">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 md:mx-auto lg:grid-cols-3 gap-8 mt-8">

            @foreach ($posts->skip(1) as $post)
                <!-- Post Card -->
                <div class="card bg-gray-50 overflow-hidden shadow-lg rounded-md">
                    <a href="{{ route('news.show', $post->id) }}">
                        <img class="w-full h-40 object-cover object-center"
                            src="/storage/images/{{ $post->image_path }}" alt="{{ $post->title }}">
                    </a>
                    <div class="p-6">
                        <h2 class="text-xl font-bold mb-2">
                            <a href="{{ route('news.show', $post->id) }}" class="text-blue-500 hover:underline">
                                {{ $post->title }}
                            </a>
                        </h2>
                        <p class="text-gray-600">Posted on {{ $post->created_at->format('M d, Y') }}</p>
                        <div class="container mx-auto mt-4">
                            <p class="text-lg font-normal mb-2 text-gray-900 font-base">
                                {{ $post->excerpt }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@else
    <!-- No Posts Available Message -->
    <div class="flex items-center justify-center mt-11 h-64 md:h-72 lg:h-80 text-lg md:text-xl lg:text-2xl">
        <h3 class="block align-middle">No Posts Available at the Moment</h3>
    </div>
@endif

@include('layouts.footer')
