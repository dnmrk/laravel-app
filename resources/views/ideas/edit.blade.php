<x-layout>
    <form method="POST" action="/ideas/{{ $idea->id }}">
        @csrf
        @method('PATCH')

        <div class="col-span-full">
            <label for="description" class="block text-sm/6 font-medium text-white">Edit Your Idea</label>
            <div class="mt-2">
                <textarea id="description" name="description" rows="3"
                    class="textarea w-full">{{ $idea->description }}</textarea>
            </div>
            <x-forms.error name="description" />
            <p class="mt-3 text-sm/6 text-gray-400">Have an idea you want to save for later?</p>
        </div>
        <div class="mt-6 flex items-center gap-x-2">
            <button type="submit"
                class="btn btn-primary">
                Update
            </button>
            <button type="submit" form="delete-idea-form"
                class="btn btn-secondary">
                Delete
            </button>
        </div>
    </form>

    <form method="POST" action="/ideas/{{ $idea->id }}" id="delete-idea-form">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
