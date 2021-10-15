<p {{ $attributes->merge(['class' => 'block text-xs text-gray-700 mt-1']) }}>
    {{ $value ?? $slot }}
</p>
