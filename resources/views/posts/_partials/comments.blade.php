<div class="text-gray-700 text-sm mb-6 space-y-5 max-h-96 overflow-y-auto">
    @forelse ($post->comments as $comment)
        <div class="border-b border-gray-200 pb-4">
            <p class="text-base text-gray-800 mb-1">{{ $comment->comment }}</p>
            <div class="flex items-center justify-between text-xs text-gray-500">
                <span>{{ $comment->created_at->diffForHumans() }}</span>
                <a href="{{ route('post.index', ['username' => $comment->user->username]) }}"
                    class="text-blue-400 hover:underline font-medium">
                    {{ '@' . $comment->user->username }}
                </a>
            </div>
        </div>
    @empty
        <p class="text-center text-gray-500 italic">No comments yet…</p>
    @endforelse
</div>
