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
                    <a href="post/{{ $post->id }}" class="text-xs text-blue-500 underline cursor-pointer font-bold">{{ $comment->user->username }}</a>
                    <p class="whitespace-wrap font-medium text-black text-sm">{{ $comment->body }}</p>
                </div>
            @endforeach
        </section>
    </div>
</x-layout>
