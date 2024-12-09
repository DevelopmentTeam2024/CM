<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ url('inquiries') }}">{{ __('Inquiries') }}</a> / {{ __('Create') }}
        </h2>
    </x-slot>

    <div class="container my-5">
        <div class="bg-white dark:bg-black p-4 rounded shadow-sm">
            <div class="row">
                <div class="col-lg-4">
                    <br />
                    <h5 class="text-left">
                        SOP-TSR 01 - Submit TSR:
                    </h5>
                    <ul class="list-group">
                        <li class="list-group-item">Review input data and understand what customer needs.</li>
                        <li class="list-group-item">From your account, open new TSR or revise TSR, select TSR type,
                            mention project details,
                            select product, attach only necessary documents and describe customer request clearly.</li>
                        <li class="list-group-item">Make sure you have the limitation for the calculation request and
                            how to deal with missing
                            information. You may discuss that with the customer if necessary (Refer to SOP-TSR 10).</li>
                        <li class="list-group-item">If the Sales Admin or technical support refused the TSR, review the
                            refusal reasons and
                            contact the customer if necessary.</li>
                        <li class="list-group-item">Resubmit the TSR if the refusal reason is tackled or settled,
                            otherwise, cancel it.test</li>
                    </ul>
                </div>
                <div class="col-lg-8">
                    <form action="{{ url('inquiries/create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">
                                        <h3>{{ __('TSR Creation') }}</h3>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">{{ __('Customer') }}:</th>
                                    <td>
                                        <input type="number" name="code" id="codeSel" class="form-control"
                                            value="{{ old('code', '') }}" required>
                                        <br />
                                        <div id="customerDiv"></div>

                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Projects') }}:</th>
                                    <td>
                                        <select name="project_id" id="project_id"
                                            class="form-control @error('project_id') is-invalid @enderror">
                                            <!-- <option value="">{{ __('Select a Project') }}</option> -->
                                            @foreach ($projects as $project)
                                                <option value="{{ $project->id }}"
                                                    {{ old('project_id') == $project->id ? 'selected' : '' }}>
                                                    {{ $project->project_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('project_name')
                                            <div class="invalid-feedback">{{ $errors->first('project_id') }}</div>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">{{ __('Sub Project') }}:</th>
                                    <td>
                                        <input type="text" name="project_name" id="project_name"
                                            class="form-control @error('project_name') is-invalid @enderror"
                                            value="{{ old('project_name', '') }}" required>
                                        @error('project_name')
                                            <div class="invalid-feedback">{{ $errors->first('project_name') }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Product') }}:</th>
                                    {{-- <td>
                                        <input type="text" name="product_code" id="product_code"
                                            class="form-control @error('product_code') is-invalid @enderror"
                                            value="{{ old('product_code', '') }}" required>
                                        @error('product_code')
                                            <div class="invalid-feedback">{{ $errors->first('product_code') }}</div>
                                        @enderror
                                    </td> --}}
                                    <td>
                                        @foreach ($products as $product)
                                            @php
                                                $prdct = \App\Enum\ProductsEnum::getItem($product);
                                            @endphp
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"
                                                    id="item{{ $prdct->code() }}" name="products[]"
                                                    value="{{ $prdct->code() }}">
                                                <label class="form-check-label"
                                                    for="item{{ $prdct->code() }}">{{ $prdct->name() }}</label>
                                            </div>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('TSR Type') }}:</th>
                                    <td>
                                        {{-- @dd($types) --}}
                                        <select name="title" id="title"
                                            class="form-select @error('title') is-invalid @enderror" required>
                                            <option value="" disabled selected>{{ __('Select the title') }}
                                            </option>
                                            @foreach ($types as $type)
                                                @php
                                                    $tsrType = \App\Enum\TSRTypesEnum::getItem($type);
                                                @endphp
                                                <option value="{{ $tsrType->code() }}">{{ $tsrType->title() }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Ser. N.') }}:</th>
                                    <td>
                                        <input type="text" name="serial_number" id="serial_number"
                                            class="form-control @error('serial_number') is-invalid @enderror"
                                            value="{{ old('serial_number', $serial_number) }}" required readonly>
                                        @error('serial_number')
                                            <div class="invalid-feedback">{{ $errors->first('serial_number') }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Description') }}:</th>
                                    <td>
                                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                            rows="5">{{ old('description', '') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                @if (
                                    $users->count() > 0 &&
                                        (auth()->user()->role->value == 'Admin' ||
                                            (auth()->user()->department->value == 'Sales' && auth()->user()->role->value == 'Manager')))
                                    <tr>
                                        <th scope="row">{{ __('Employee') }}:</th>
                                        <td>
                                            <select name="employee" id="employee"
                                                class="form-select @error('employee') is-invalid @enderror" required>
                                                <option value="" disabled selected>
                                                    {{ __('Select the Sales Employee') }}
                                                </option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">
                                                        {{ $user->code }}. {{ $user->name }}
                                                        ({{ $user->role->value }})
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('employee')
                                                <div class="invalid-feedback">{{ $errors->first('employee') }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                @else
                                    <input type="hidden" name="employee" value="{{ $user_id }}">
                                @endif
                                <tr>
                                    <th scope="row">{{ __('Attachment') }}:</th>
                                    <td>
                                        <input type="file" name="files[]" id="files"
                                            class="form-control @error('files') is-invalid @enderror" multiple required>
                                        @error('files')
                                            <div class="invalid-feedback">{{ $errors->first('files') }}</div>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" class="text-end">
                                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('extra_js')
        <script>
            $(document).ready(function() {
                function getCustomer(code) {
                    var url = '{{ url('/') }}';
                    $("#customerDiv").load(url + "/getCustomer/" + code);
                }
                var defCode = $('#codeSel').val();
                getCustomer(defCode);
                $('#codeSel').keyup(function(e) {
                    var code = $(this).val();
                    getCustomer(code);
                });
            });
        </script>
    @endpush
</x-app-layout>
