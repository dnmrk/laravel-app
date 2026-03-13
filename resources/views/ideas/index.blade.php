<x-layout>
    @if ($ideas->count())
        <div class="mt-6 text-white">
            <h2 class="font-bold">Your Ideas</h2>
            <ul class="mt-6 grid grid-cols-2 gap-x-6 gap-y-4">
                @foreach ($ideas as $idea)
                    <x-idea-card href="/ideas/{{ $idea->id }}/edit">
                        {{ $idea->description }}
                    </x-idea-card>
                @endforeach
            </ul>
        </div>
    @else
        <p class="">You have no ideas yet.
            <a class="underline" href="/ideas/create" class="text-indigo-500">Create one now!</a>
        </p>
    @endif
</x-layout>