<x-layout>
    <x-slot:heading>
        Hello {{ auth()->user()->username }}!
    </x-slot:heading>
    <div class="space-y-4 px-64">
        <form action="/post" method="POST" class="flex flex-col gap-4">
            @csrf
                <div>
                    <label for="body" class="text-xs font-bold text-gray-500">What's on your mind?</label>
                    <input type="text" id="body" name="body" class="w-full rounded-lg border border-gray-300">
                </div>
            <div class="flex justify-end items-center">
                <button class="hover:bg-opacity-75 bg-blue-500 text-white text-xs font-medium text-md px-4 py-1 rounded-lg">Post</button>
            </div>
        </form>
        <div class="grid grid-cols-1 gap-3">
            @foreach($posts as $post)
                <section class="block border border-gray-300 p-3 rounded-lg">
                    <a href="post/{{ $post->id }}" class="text-xs text-blue-500 underline cursor-pointer font-bold">{{ $post->user->username }}</a>
                    <p class="whitespace-wrap font-bold text-black text-md">{{ $post->body }}</p>
                </section>
            @endforeach
        </div>
    </div>
</x-layout>
