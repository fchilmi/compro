@props(['active' => false])
<a {{ $attributes }}
    class="block rounded-md px-3 py-2 text-sm font-medium hover:underline  {{ $active ? 'bg-gray-900 text-white' : 'text-gray-800 hover:bg-gray-700 hover:text-white' }}"
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
