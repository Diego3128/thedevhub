<div class="max-w-xl mx-auto space-y-8">
    @forelse ($posts as $post)
        <div class="bg-white rounded-xl shadow-sm border border-gray-300">
            {{-- User info --}}
            <div class="flex items-center gap-3 p-4">
                <img draggable="false" class="w-10 h-10 bg-gray-200 rounded-full"
                    src="{{ route('user.profile.image', ['user' => $post->user->username]) }}"
                    alt="{{ $post->user->username }}  profile picture">
                <div>
                    <p class="font-semibold text-sm">{{ $post->user->username }}</p>
                    <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                </div>
            </div>

            {{-- Image --}}
            <div class="w-full">
                <img draggable="false" src="{{ asset("storage/uploads/$post->image_path") }}"
                    alt="Post image {{ $post->title }}" class="w-full h-auto object-cover max-h-[500px]">
            </div>

            {{-- Post content --}}
            <div class="px-3 py-1">
                <h2 class="text-sm">{{ $post->title }}</h2>

                @if ($post->description)
                    <p class="text-sm text-gray-700">{{ $post->description }}</p>
                @endif

                @php $likes = $post->likes()->count(); @endphp

                <p class="font-bold text-sm text-gray-600">
                    {{ $likes }} {{ trans_choice('{0} Likes|{1} Like|[2,*] Likes', $likes) }}
                </p>


                <a href="{{ route('posts.show', ['user' => $post->user->username, 'post' => $post->id]) }}"
                    class="text-sm text-blue-600 hover:underline">
                    View full post
                </a>
            </div>
        </div>
    @empty
        <p class="text-center text-gray-600">No posts to show</p>
    @endforelse

    <div class="mt-6">
        {{ $posts->links('vendor.pagination.tailwind') }}
    </div>
</div>
