<x-layout>
    <form action="/login" method="POST">
        @csrf
        <fieldset class="fieldset bg-base-200 border-base-200 round-box w-xs border p-4 mx-auto">
            <legend class="fieldset-legend">Log In</legend>

            <label for="email" class="label">Email</label>
            <input type="email" class="input" name="email" placeholder="Your Email" required />
            <x-forms.error name="email" />

            <label class="label">Password</label>
            <input type="password" class="input" name="password" placeholder="Password" required />
            <x-forms.error name="password" />

            <button class="btn btn-neatral mt-4">Log In</button>
        </fieldset>
    </form>
</x-layout>