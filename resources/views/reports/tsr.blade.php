<x-app-layout>
    <x-slot name="header">{{ __('Reports') }} / {{ __('TSR') }}</x-slot>

    <div id="mainContainer">
        <div id="subContainer">
            <div class="row bg-white dark:bg-black my-1">
                <div class="col-lg-12">
                    <form action="{{ url('reports/tsr') }}" method="POST">
                        @csrf
                        @method('POST')
                        @php
                            $currentUser = $user_id ?? Auth::user()->id;
                            $startDate = $start ?? now()->firstOfMonth()->format('Y-m-d');
                            $endDate = $end ?? now()->endOfMonth()->format('Y-m-d');
                        @endphp
                        <table class="table table-stripped">
                            <tbody>
                                <tr>
                                    <th>{{ __('User') }}: </th>
                                    <td>
                                        <select class="form-control" name="user" size="1">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    @if ($user->id == old('user', $currentUser)) selected @endif>
                                                    {{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <th>{{ __('From') }}: </th>
                                    <td>
                                        <input type="date" name="start" value="{{ old('start', $startDate) }}"
                                            id="startDate" class="form-control" required>
                                    </td>
                                    <th>{{ __('To') }}: </th>
                                    <td>
                                        <input type="date" name="end" value="{{ old('end', $endDate) }}"
                                            id="endDate" class="form-control" required>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
            @isset($orders)
                <h3 class="text-center text-danger">Search Results: <strong>{{ $count }}</strong> from
                    <strong>{{ $total }}</strong> ( <strong>{{ round($count / $total, 4) * 100 }}% )</strong>
                </h3>
                <hr />
                @include('orders.partials.charts')
                <hr />
                <div class="row bg-white dark:bg-black my-1">
                    @include('orders.list')
                </div>
            @endisset
        </div>
    </div>
</x-app-layout>
