<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ url('reports') }}">{{ __('Reports') }}</a> / {{ __('Export') }}
        </h2>
    </x-slot>

    <div class="container my-5">
        <div class="bg-white dark:bg-black p-4 rounded shadow-sm">
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ route('reports.export') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">
                                        <h3>{{ __('Report Generation') }}</h3>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">{{ __('Date Range') }}:</th>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="date" name="start_date"
                                                    class="form-control @error('start_date') is-invalid @enderror"
                                                    value="{{ old('start_date') }}" required>
                                                @error('start_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <input type="date" name="end_date"
                                                    class="form-control @error('end_date') is-invalid @enderror"
                                                    value="{{ old('end_date') }}" required>
                                                @error('end_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">{{ __('Assigned Sales Employee') }}:</th>
                                    <td>
                                        <select name="sales_employee" id="salesEmployeeSelect"
                                            class="form-select @error('sales_employee') is-invalid @enderror">
                                            <option value="">{{ __('Select Sales Employee') }}</option>
                                            @foreach ($salesEmployees as $employee)
                                                <option value="{{ $employee->id }}" {{ old('sales_employee') == $employee->id ? 'selected' : '' }}>
                                                    {{ $employee->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('sales_employee')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('TSR Type') }}:</th>
                                    <td>
                                        <select name="tsr_type"
                                            class="form-select @error('tsr_type') is-invalid @enderror">
                                            <option value="">{{ __('Select TSR Type') }}</option>
                                            @foreach ($tsrTypes as $type)
                                                <option value="{{ $type }}" {{ old('tsr_type') == $type ? 'selected' : '' }}>
                                                    {{ $type}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('tsr_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Customer') }}:</th>
                                    <td>
                                        <select name="customer" id="customerSelect"
                                            class="form-select @error('customer') is-invalid @enderror">
                                            <option value="">{{ __('Select Customer') }}</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}" {{ old('customer') == $customer->id ? 'selected' : '' }}>
                                                    {{ $customer->name_en }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('customer')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Project') }}:</th>
                                    <td>
                                        <select name="project"
                                            class="form-select @error('project') is-invalid @enderror">
                                            <option value="">{{ __('Select Project') }}</option>
                                            @foreach ($projects as $project)
                                                <option value="{{ $project->id }}" {{ old('project') == $project->id ? 'selected' : '' }}>
                                                    {{ $project->project_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('project')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Export Format') }}:</th>
                                    <td>
                                        <select name="export_format"
                                            class="form-select @error('export_format') is-invalid @enderror" required>
                                            <option value="excel">{{ __('Excel') }}</option>
                                            <option value="pdf">{{ __('PDF') }}</option>
                                        </select>
                                        @error('export_format')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" class="text-end">
                                        <button type="submit"
                                            class="btn btn-primary">{{ __('Generate Report') }}</button>
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
        <!-- <script>
            $(document).ready(function () {
                function getCustomer(code) {
                    var url = '{{ url('/getCustomer') }}/' + code;

                    $.ajax({
                        url: url,
                        method: 'GET',
                        success: function (data) {
                            // Clear and populate the customer dropdown
                            var customerSelect = $('#customerSelect');
                            customerSelect.empty();
                            customerSelect.append('<option value="">{{ __('Select Customer') }}</option>');

                            if (data.length > 0) {
                                console.log(data);

                                data.forEach(function (customer) {
                                    customerSelect.append(`<option value="${customer.id}">${customer.name_en}</option>`);
                                });

                                // Show the customer dropdown
                                customerSelect.show();
                            } else {
                                // Hide if no customers found
                                customerSelect.hide();
                            }
                        },
                        error: function () {
                            alert('{{ __('Failed to fetch customers.') }}');
                        }
                    });
                }

                // Event listener for employee selection change
                $('#salesEmployeeSelect').change(function () {
                    var code = $(this).val();

                    if (code) {
                        getCustomer(code);
                    } else {
                        // Hide and clear the customer dropdown if no employee selected
                        $('#customerSelect').hide().empty();
                        $('#customerSelect').append('<option value="">{{ __('Select Customer') }}</option>');
                    }
                });
            });
        </script> -->

    @endpush
</x-app-layout>