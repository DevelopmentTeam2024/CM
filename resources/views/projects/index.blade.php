<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>
    <div class="container-fluid my-5">
        <div class="row bg-white dark:bg-black">
            @isset($page)
                @include('projects.' . $page)
            @endisset
            <div class="col">
                <table id="dTbl" class="table table-striped" data-page-length="50"
                    data-order="[[ 0, &quot;asc&quot; ]]">
                    <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Project Name') }}</th>
                            <th data-orderable="false">
                                @empty($page)
                                    <a href="{{ url('projects/create') }}" class="btn btn-success">{{ __('Create') }}</a>
                                @else
                                    <a href="{{ url('projects') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                                @endempty
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $project->project_name }}</td>
                                <td>
                                    @if (App\Models\User::where(['role' => 'Admin'])->count() > 1)
                                    @empty($page)
                                        <form action="{{ url('projects/' . $project->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ url('projects/' . $project->id . '/edit') }}"
                                                class="btn btn-success">{{ __('Edit') }}</a>
                                            <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                        </form>
                                    @endempty
                                @else
                                    <a href="{{ url('projects/' . $project->id . '/edit') }}"
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
