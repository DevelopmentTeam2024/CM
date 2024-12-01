<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <div class="container-fluid my-5">
        <div class="row bg-white dark:bg-black">
            @isset($page)
                @include('users.' . $page)
            @endisset
            <div class="col">
                <table id="dTbl" class="table table-striped" data-page-length="50"
                    data-order="[[ 0, &quot;asc&quot; ]]">
                    <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Code') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Branch') }}</th>
                            <th>{{ __('Department') }}</th>
                            <th>{{ __('Role') }}</th>
                            <th data-orderable="false">
                                @empty($page)
                                    <a href="{{ url('users/create') }}" class="btn btn-success">{{ __('Create') }}</a>
                                @else
                                    <a href="{{ url('users') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                                @endempty
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->code }}</td>
                                <td><a href="mailto:{{ $user->email }}" class="btn btn-info">Email</a></td>
                                <td>{{ $user->branch?->value }}</td>
                                <td>{{ $user->department->value }}</td>
                                <td>{{ $user->role->value }}</td>
                                <td>
                                    @if (App\Models\User::where(['role' => 'Admin'])->count() > 1)
                                    @empty($page)
                                        <form action="{{ url('users/' . $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ url('users/' . $user->id . '/edit') }}"
                                                class="btn btn-success">{{ __('Edit') }}</a>
                                            <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                        </form>
                                    @endempty
                                @else
                                    <a href="{{ url('users/' . $user->id . '/edit') }}"
                                        class="btn btn-success">{{ __('Edit') }}</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</x-app-layout>
