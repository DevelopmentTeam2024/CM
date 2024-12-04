<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ url('reports') }}">{{ __('Reports') }}</a> / {{ __('Generate Report') }}
        </h2>
    </x-slot>

    <div class="container my-5">
        <div class="bg-white dark:bg-black p-4 rounded shadow-sm">
            <div class="row">
                <div class="col-lg-8">
                    <form id="reportForm">
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
                                <!-- Date Range -->
                                <tr>
                                    <th scope="row">{{ __('Date Range') }}:</th>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="date" name="start_date" class="form-control" required>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="date" name="end_date" class="form-control" required>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Assigned Sales Employee -->
                                <tr>
                                    <th scope="row">{{ __('Assigned Employees') }}:</th>
                                    <td>
                                        <select name="employee" class="form-select">
                                            <option value="all">{{ __('All Employees') }}</option>
                                            <option value="all_sales">{{ __('All Sales') }}</option>
                                            @foreach ($salesEmployees as $employee)
                                                <option value="{{ $employee->id }}" {{ old('sales_employee') == $employee->id ? 'selected' : '' }}>
                                                      -- {{ $employee->name }}
                                                </option>
                                            @endforeach

                                            <option value="all_tech">{{ __('All Technical') }}</option>
                                            @foreach ($techEmployees as $employee)
                                                <option value="{{ $employee->id }}" {{ old('sales_employee') == $employee->id ? 'selected' : '' }}>
                                                      -- {{ $employee->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <!-- Customer -->
                                <tr>
                                    <th scope="row">{{ __('Customer') }}:</th>
                                    <td>
                                        <select name="customer" class="form-select">
                                            <option value="all">{{ __('All Customers') }}</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}">
                                                    {{ $customer->name_en }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <!-- TSR Type -->
                                <tr>
                                    <th scope="row">{{ __('TSR Type') }}:</th>
                                    <td>
                                        <select name="tsr_type" class="form-select">
                                            <option value="all">{{ __('All TSR Types') }}</option>
                                            @foreach ($tsrTypes as $type)
                                                <option value="{{ $type }}">
                                                    {{ $type }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <!-- Project -->
                                <tr>
                                    <th scope="row">{{ __('Project') }}:</th>
                                    <td>
                                        <select name="project" class="form-select">
                                            <option value="all">{{ __('All Projects') }}</option>
                                            @foreach ($projects as $project)
                                                <option value="{{ $project->id }}">
                                                    {{ $project->project_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" class="text-end">
                                        <button type="button" class="btn btn-primary" id="generateReportButton">
                                            {{ __('Generate Report') }}
                                        </button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>
            </div>

            <div class="mt-5">
                <!-- Export buttons -->
                <div class="mb-3">
                    <button class="btn btn-success" id="exportToExcel">{{ __('Export to Excel') }}</button>
                    <button class="btn btn-danger" id="exportToPDF">{{ __('Export to PDF') }}</button>
                </div>

                <table id="reportTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Project</th>
                            <th>Product Code</th>
                            <th>User</th>
                            <th>Customer</th>
                            <th>Approved Date</th>
                            <th>Accepted Date</th>
                            <th>Finished Date</th>
                            <th>Last Finished Date</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>

<!-- JSZip and ExcelJS for Excel export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>

<!-- jsPDF library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<!-- jsPDF autoTable plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>






    <script>
    $(document).ready(function () {
        var table = $('#reportTable').DataTable();

        // Generate report button (ajax loading data)
        $('#generateReportButton').on('click', function () {
            var formData = $('#reportForm').serialize();

            $.ajax({
                url: "{{ route('reports.export') }}",
                type: 'GET',
                data: formData,
                success: function (data) {
                    table.clear();
                    data.forEach(function (row) {
                        table.row.add([
                            row.id,
                            row.title,
                            row.project,
                            row.product_code,
                            row.user_name,
                            row.customer_name,
                            row.approved_date,
                            row.accepted_date,
                            row.finished_date,
                            row.finished_last_date,
                        ]).draw();
                    });
                }
            });
        });

           // Export to Excel
           $('#exportToExcel').on('click', function () {
    var data = [];
    var header = [];

    // Get the header row from the table
    $('#reportTable thead tr').each(function () {
        var row = [];
        $(this).find('th').each(function () {
            row.push($(this).text()); // Push the text from each header cell
        });
        header.push(row); // Store the header row
    });

    // Get all rows including hidden rows (all pages)
    table.rows({ search: 'applied' }).every(function (rowIdx, tableLoop, rowLoop) {
        data.push(this.data()); // Push the data of each row to the array
    });

    // Create a new Excel workbook
    var wb = XLSX.utils.book_new();

    // Combine the header with the data
    var combinedData = [header[0], ...data]; // Add header as the first row, followed by the data rows

    // Convert the combined data to a worksheet
    var ws = XLSX.utils.aoa_to_sheet(combinedData);
    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

    // Apply styles to the header row
    var sheet = wb.Sheets.Sheet1;
    var range = { s: { r: 0, c: 0 }, e: { r: 0, c: header[0].length - 1 } }; // Range of the header row
    for (var row = range.s.r; row <= range.e.r; row++) {
        for (var col = range.s.c; col <= range.e.c; col++) {
            var cellAddress = { r: row, c: col };
            var cellRef = XLSX.utils.encode_cell(cellAddress);
            if (!sheet[cellRef]) sheet[cellRef] = {};
            sheet[cellRef].s = {
                fill: {
                    fgColor: { rgb: "FFFF00" } // Yellow background color for the header
                },
                font: {
                    bold: true, // Bold text for the header
                    color: { rgb: "000000" } // Black font color for the header
                },
                alignment: { horizontal: "center", vertical: "center" } // Center alignment
            };
        }
    }

    // Format the dates in the Excel sheet
    Object.keys(sheet).forEach(function (cell) {
        var cellValue = sheet[cell].v;
        if (cellValue instanceof Date) {
            sheet[cell].t = 'n'; // Set cell type to number
            sheet[cell].z = XLSX.SSF._table[14]; // Date format
        }
    });

    // Export the Excel file
    XLSX.writeFile(wb, 'report.xlsx');
});



// $('#exportToPDF').on('click', function () {
//     const { jsPDF } = window.jspdf;
//     var doc = new jsPDF();
//     var tableContent = [];

//     // Collect table content (header and body)
//     $('#reportTable thead tr').each(function () {
//         var row = [];
//         $(this).find('th').each(function () {
//             row.push($(this).text());
//         });
//         tableContent.push(row);
//     });

//     $('#reportTable tbody tr').each(function () {
//         var row = [];
//         $(this).find('td').each(function () {
//             row.push($(this).text());
//         });
//         tableContent.push(row);
//     });

//     // Add table content to PDF without any extra styling (like Excel export)
//     doc.autoTable({
//         head: tableContent.slice(0, 1), // Table header
//         body: tableContent.slice(1),    // Table rows
//         theme: 'striped',                 // Remove any table styling
//         headStyles: { fillColor: [0, 0, 0], fontSize: 8, fontStyle: 'normal', fontColor: 'black' }, // Simple header styling
//         styles: { fontSize: 6, cellPadding: 1 }, // Simple body styles, no extra padding or large font sizes
//     });

//     // Save the PDF
//     doc.save('report.pdf');
// });


$('#exportToPDF').on('click', function () {
    const { jsPDF } = window.jspdf;
    var doc = new jsPDF();
    var tableContent = [];

    // Collect table header content
    $('#reportTable thead tr').each(function () {
        var row = [];
        $(this).find('th').each(function () {
            row.push($(this).text());
        });
        tableContent.push(row);
    });

    // Collect all table body content (all rows including hidden ones)
    var allData = $('#reportTable').DataTable().rows({ search: 'applied' }).data();

    allData.each(function (rowData) {
        var row = [];
        $(rowData).each(function (index, value) {
            // Wrap the text if it's too long
            if (index === 3) { // Assuming the "projects" column is the 4th column (index starts at 0)
                value = doc.splitTextToSize(value, 50); // Wrap text to max width of 50 units
            }
            row.push(value);
        });
        tableContent.push(row);
    });

    // Add table content to PDF with controlled column widths
    doc.autoTable({
        head: [tableContent[0]], // Table header
        body: tableContent.slice(1),    // Table rows
        theme: 'striped',                 // Simple striped styling
        headStyles: { fillColor: [0, 0, 0], fontSize: 8, fontStyle: 'normal', textColor: 'white' }, // Simple header styling
        styles: { fontSize: 6, cellPadding: 0.5 }, // Simple body styles
        columnStyles: {
            3: { cellWidth: 50 }, // Set "projects" column width (adjust index as per your table)
        },
    });

    // Save the PDF
    doc.save('report.pdf');
});


});
    </script>
        <script>
    $(document).ready(function() {
        // When the end date changes
        $('input[name="end_date"]').on('change', function() {
            // Get the selected end date value
            var endDate = $(this).val();
            if (endDate) {
                // Set the min attribute of the start date
                $('input[name="start_date"]').attr('max', endDate);
            } else {
                // If no end date, remove the restriction
                $('input[name="start_date"]').removeAttr('max');
            }
        });

        // When the start date changes
        $('input[name="start_date"]').on('change', function() {
            // Get the selected start date value
            var startDate = $(this).val();
            if (startDate) {
                // Set the min attribute of the end date
                $('input[name="end_date"]').attr('min', startDate);
            } else {
                // If no start date, remove the restriction
                $('input[name="end_date"]').removeAttr('min');
            }
        });
    });
</script>

</x-app-layout>
