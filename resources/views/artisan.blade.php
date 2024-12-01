<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <div class="container-fluid my-5">
        <div class="row bg-white dark:bg-black">
            <div class="cal-lg-12">
                <form action="{{ url('artisan') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="text" class="form-control" name="command" placeholder="Enter Artisan command" required>
                    <br />
                    <button type="submit" class="btn btn-success">Run Command</button>
                </form>
            </div>

            @if (session('error'))
                <p style="color: red;">{{ session('error') }}</p>
            @endif

            @if (isset($result))
                <br /><br />
                <hr><br />
                <pre>{{ $result }}</pre>
                <br />
                <hr><br /><br />
                <p>Exit Code: {{ $exitCode }}</p>
            @endif
        </div>
    </div>
</x-app-layout>
