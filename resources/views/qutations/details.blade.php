<div class="bg-white dark:bg-black p-4 rounded shadow-sm">

    <table class="table table-striped">
        <thead>
            <tr>
                <th colspan="3" class="text-center text-danger">Quotation Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>{{ __('Qutation Number') }}</th>
                <td colspan="2"><x-number number="{{ $qutation->qutation_number }}" /></td>
            </tr>
            <tr>
                <th>{{ __('Products') }}</th>
                <td colspan="2"><strong>{{ $qutation->items()->distinct('group_code')->count('group_code') }}</strong>
                </td>
            </tr>
            <tr>
                <th>{{ __('Items') }}</th>
                <td colspan="2"><strong>{{ $qutation->items->count() }}</strong></td>
            </tr>
            <tr>
                <th>{{ __('Total Price') }}</th>
                <td></td>
                <td><strong> = {{ number_format($qutation->total_price, 2) }}</strong></td>
            </tr>
            <tr>
                <th>{{ __('Discount') }}</th>
                <td><strong>{{ number_format($qutation->discount_percentage, 2) }}%</strong></td>
                <td><strong> = - {{ number_format($qutation->discount_value, 2) }}</strong></td>
            </tr>

            <tr>
                <th>{{ __('Net Price') }}</th>
                <td></td>
                <td><strong> = {{ number_format($qutation->net_price, 2) }}</strong></td>
            </tr>
            <tr>
                <th>{{ __('VAT') }}</th>
                <td><strong>{{ number_format($qutation->vat_percentage, 2) }}%</strong></td>
                <td><strong> = + {{ number_format($qutation->vat_value, 2) }}</strong></td>
            </tr>
            <tr>
                <th>{{ __('Sell Price') }}</th>
                <td></td>
                <td> = <strong>{{ number_format($qutation->final_price, 2) }}</strong></td>
            </tr>
            <tr>
                <th>{{ __('Status') }}</th>
                <td colspan="2">
                    <span class="badge bg-success rounded-pill">
                        <i class="fa fa-receipt"></i> {{ $qutation->status }}
                    </span>
                </td>
            </tr>
        </tbody>
        @if (Auth::user()->department->value == 'Sales' || Auth::user()->role->value == 'Admin')
            @if ($qutation->status == 'Quotation')
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-start">
                            <form action="{{ url('qutations/' . $qutation->order->id . '/' . $qutation->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="fieldName" value="status">
                                <input type="hidden" name="fieldValue" value="Sales Order">
                                <label for="files">
                                    {{ __('Customer Approval') }}:
                                    <input type="file" name="files[approval]" id="files"
                                        class="form-control @error('files') is-invalid @enderror" required>
                                </label>
                                @error('files')
                                    <div class="invalid-feedback">{{ $errors->first('files') }}</div>
                                @enderror
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-circle-check"></i> Approve
                                </button>
                                <a href="{{ url('qutations/' . $qutation->order->id . '/' . $qutation->id . '/delete') }}"
                                    class="btn btn-danger">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </form>
                        </td>
                    </tr>
                </tfoot>
            @else
                @if ($qutation->files->count() > 0)
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-center">
                                @php
                                    $file = $qutation->files->first();
                                @endphp
                                <a href="{{ asset($file->path) }}"
                                    download="Q_{{ $qutation->qutation_number }}_Approval.{{ $file->file_ext }}"
                                    class=" btn btn-success">
                                    <i class="fa fa-download"></i> {{ __('Customer Approval') }}
                                </a>
                            </td>
                        </tr>
                    </tfoot>
                @endif
            @endif
        @endif
    </table>
</div>
