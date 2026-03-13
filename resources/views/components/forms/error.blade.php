@props([
    'name' => 'required'
])

@error($name)
    <p class="mt-2 text-sm/6 text-red-500">{{ $message }}</p>
@enderror