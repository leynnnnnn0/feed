<x-layout>
    <x-slot:heading>
        Post by: {{ $post->user->username }}
    </x-slot:heading>
    <div class="block border border-gray-300 p-3 rounded-lg">
        <p class="whitespace-wrap font-bold text-black text-md">{{ $post->body }}</p>
        <section class="inline space-y-2">
            <div class="border-b border-gray-500 w-full my-5"></div>
            <h1 class="text-sm font-medium text-gray-900">Comments</h1>
            @foreach($post->comments as $comment)
                <div class="border-b border-gray-300">
                    <a href="/profile/{{ $comment->user->id }}" class="text-xs text-blue-500 underline cursor-pointer font-bold">{{ $comment->user->username }}</a>
                    <p class="whitespace-wrap font-medium text-black text-sm">{{ $comment->body }}</p>
                </div>
            @endforeach
            <form action="/comment" method="POST" class="flex flex-col gap-2">
                @csrf
                <input type="text" hidden name="post_id" value="{{ $post->id }}">
                <div class="inline">
                    <label for="body" class="text-xs font-bold text-gray-500">Add Comment</label>
                    <input type="text" id="body" name="body" class="w-full rounded-lg border border-gray-300">
                </div>
                <div class="flex justify-end items-center">
                    <button class="hover:bg-opacity-75 bg-blue-500 text-white text-xs font-medium text-md px-4 py-1 rounded-lg">Add</button>
                </div>
            </form>
        </section>
    </div>
    <a href="/posts" class="mt-5 underline font-medium text-xs">Back to posts</a>
</x-layout>
