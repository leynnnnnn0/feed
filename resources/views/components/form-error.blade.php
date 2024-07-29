@props(['name'])
@error($name)
    <p class="text-red-500 text-xs font-medium">{{ $message }}</p>
@enderror
