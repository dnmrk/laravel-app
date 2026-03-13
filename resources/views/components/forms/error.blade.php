@props([
    'name' => 'required'
])

@error($name)
    <p class="mt-2 text-sm/6 text-error">{{ $message }}</p>
@enderror