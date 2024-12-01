<input type="hidden" name="customer_id" value="{{ $customer->id }}">
<table class="table table-striped">
    <tbody>
        <tr>
            <th>{{ __('Customer Code') }}: </th>
            <td><strong>{{ $customer->code }}</strong></td>
        </tr>
        <tr>
            <th>{{ __('Customer Name') }}: </th>
            <td>{{ $customer->name_en }}<br />{{ $customer->name_ar }}</td>
        </tr>
    </tbody>
</table>
