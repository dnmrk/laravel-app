<x-layout title="Home">
    @if(count($tasks))
        <p>Yes, we have some tasks.</p>
    @endif
    
    @unless(count($tasks))
        <p>No, we don't have any tasks.</p>
    @endunless
    
    @forelse($tasks as $task)
        <li>{{ $task }}</li>
    @empty
        <p>No tasks found.</p>
    @endforelse


    @auth
        <p>Welcome back, {{ auth()->user()->name }}!</p>
    @else
        <p>Please log in to see your tasks.</p>
    @endauth


    @can('create', App\Models\Task::class)
        <p>You can create a new task.</p>
    @else
        <p>You cannot create a new task.</p>
    @endcan
</x-layout>