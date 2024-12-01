<div class="bg-white dark:bg-black p-4 rounded shadow-sm">
    <form action="{{ url('qutations/' . $order->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <table class="table table-striped">
            <thead>
                <tr>
                    <th colspan="2" class="text-center text-danger">Quotation Data</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>
                        <label for="quotationNumber">
                            Quotation Number:
                        </label>
                    </th>
                    <td>
                        <input type="text" name="quotation_number" id="quotationNumber" class="form-control" required
                            placeholder="Quotation Number">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="excelFile">
                            Quotation Excel File:
                        </label>
                    </th>
                    <td>
                        <input type="file" name="files[]" id="excelFile" class="form-control" required multiple
                            accept=".xls, .xlsx">
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="text-end">
                        <button type="submit" class="btn btn-success" name="upload" value="{{ time() }}">
                            <i class="fa fa-upload"></i>
                            Upload
                        </button>
                    </td>
                </tr>
            </tfoot>
        </table>

    </form>
</div>
