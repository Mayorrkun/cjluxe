@props(['name'])
@error($name)
<p class="text-red-700 w-full block text-left text-sm lg:text-xs">
    {{$message}}
</p>
@enderror
