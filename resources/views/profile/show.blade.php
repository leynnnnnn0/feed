<x-layout>
    <x-slot:heading>
        {{ $user->username }}'s feed
    </x-slot:heading>
    <div class="space-y-4 px-64">
        @foreach($user->posts as $post)
            <section class="block border border-gray-300 p-3 rounded-lg">
                <a href="/post/{{ $post->id }}" class="text-xs text-blue-500 underline cursor-pointer font-bold">{{ $post->user->username }}</a>
                <p class="whitespace-wrap font-bold text-black text-md">{{ $post->body }}</p>
            </section>
        @endforeach
    </div>
</x-layout>
