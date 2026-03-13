<x-layout>
    @if ($ideas->count())
        <div class="mt-6 text-white">
            <h2 class="font-bold">Your Ideas</h2>
            <ul class="mt-6">
                @foreach ($ideas as $idea)
                    <a href="/ideas/{{ $idea->id }}" class="text-sm">{{ $idea->description }}</a>
                @endforeach
            </ul>
        </div>
    @else
        <p class="">You have no ideas yet.
            <a class="underline" href="/ideas/create" class="text-indigo-500">Create one now!</a>
        </p>
    @endif
</x-layout>