<table class="table table-striped">
    <tbody>
        <tr>
            <th>{{ __('Customer Code') }}: </th>
            <td>
                <input type="number" name="customer_code" id="customer_code"
                    class="form-control @error('customer_code') is-invalid @enderror"
                    value="{{ old('customer_code', '') }}" required>
                @error('customer_code')
                    <div class="invalid-feedback">{{ $errors->first('customer_code') }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>{{ __('Customer Name') }}: </th>
            <td>
                <input type="text" name="customer_name" id="customer_name"
                    class="form-control @error('customer_name') is-invalid @enderror"
                    value="{{ old('customer_name', '') }}" required>
                @error('customer_name')
                    <div class="invalid-feedback">{{ $errors->first('customer_name') }}</div>
                @enderror
            </td>
        </tr>
    </tbody>
</table>
