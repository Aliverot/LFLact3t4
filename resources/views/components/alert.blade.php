@props(['type' => 'info'])

@php
    $class = match($type) {
        'danger' => 'text-red-800 bg-red-100',
        'success' => 'text-green-800 bg-green-100',
        'warning' => 'text-yellow-800 bg-yellow-100',
        'dark' => 'text-gray-800 bg-gray-900',
        default => 'text-blue-800 bg-blue-100',
    };
@endphp

<div {{ $attributes->merge(['class' => 'p-4 text-sm rounded-lg ' . $class]) }} role="alert">
    <span class="font-medium">{{ $title ?? 'Info Alert!' }}</span> {{ $slot }}
</div>