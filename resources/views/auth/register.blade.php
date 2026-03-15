<x-layout>
    <form action="/register" method="POST">
        @csrf
        <fieldset class="fieldset bg-base-200 border-base-200 round-box w-xs border p-4 mx-auto">
            <legend class="fieldset-legend">Register Form</legend>

            <label for="name" class="label">Name</label>
            <input type="input" class="input" name="name" placeholder="Your Name" required />

            <label for="email" class="label">Email</label>
            <input type="input" class="input" name="email" placeholder="Your Email" required />

            <label class="label">Password</label>
            <input type="password" class="input" name="password" placeholder="Password" required />

            <button class="btn btn-neatral mt-4">Register</button>
        </fieldset>
    </form>
</x-layout>
