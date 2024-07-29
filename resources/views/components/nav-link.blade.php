@props(['active' => false])
<a {{ $attributes }}
   class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white {{ $active ? "bg-gray-900" : "" }}"
>{{ $slot }}</a>
