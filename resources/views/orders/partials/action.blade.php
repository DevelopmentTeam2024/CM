@error('reasons')
    <small class="text-danger">{{ $message }}</small>
@enderror


<form action="{{ url('inquiries/' . $order->id) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
    <table class="table table-striped">
        <thead>
            <tr>
                <th colspan="2" class="text-center">{{ __($action['action']) }}</th>
            </tr>
        </thead>
        <tbody>
            @if ($action['action'] == 'Edit')

                <tr>
                    <th scope="row">{{ __('Customer') }}:</th>
                    <td>
                        <input type="text" name="customer_name" id="customer_name" class="form-control"
                            value="{{ $order->customer_name }}" required>
                    </td>
                </tr>

                <tr>
                    <th scope="row">{{ __('Project') }}:</th>
                    <td>
                        <select name="project_id" id="project_id"
                            class="form-control @error('project_id') is-invalid @enderror" required>
                            <!-- <option value="">{{ __('Select a Project') }}</option> -->
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}"
                                    {{ old('project_id', $order->project_id) == $project->id ? 'selected' : '' }}>
                                    {{ $project->project_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('project_id')
                            <div class="invalid-feedback">{{ $errors->first('project_id') }}</div>
                        @enderror
                    </td>
                </tr>


                <tr>
                    <th scope="row">{{ __('Sub Project') }}:</th>
                    <td>
                        <input type="text" name="project_name" id="project_name" class="form-control"
                            value="{{ $order->project_name }}" required>

                    </td>
                </tr>
                <tr>
                    <th scope="row">{{ __('Product') }}:</th>
                    <td>
                        <input type="text" name="product_code" id="product_code" class="form-control"
                            value="{{ $order->product_code }}" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row">{{ __('Title') }}:</th>
                    <td>
                        @php
    $titles = App\Repo\OrdersRepo::getTitlesList();
                        @endphp
                        <select name="title" id="title" class="form-select" required>
                            @foreach ($titles as $code => $text)
                                <option value="{{ $code }}" @if ($code == $order->title) selected @endif>
                                    {{ $text }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>

            @endif

            @if ($action['action'] == 'Revise')
                        <!-- Hidden Fields for Action and Order -->
                        <input type="hidden" name="action" value="Revise">
                        {{-- <input type="hidden" name="order_id" value="{{ $order->id }}"> --}}
                        <input type="hidden" name="selected_tsr_id" value="{{ $order->id }}">


                        <!-- Customer Name -->
                        <tr>
                            <th scope="row">{{ __('Customer') }}:</th>
                            <td>
                                <input type="text" name="customer_name" id="customer_name" class="form-control"
                                    value="{{ old('customer_name', $order->customer_name) }}" readonly>
                                <input type="hidden" name="customer_name_hidden" value="{{ $order->customer_name }}">
                            </td>
                        </tr>

                        <!-- Project Name -->
                        <tr>
                            <th scope="row">{{ __('Project') }}:</th>
                            <td>
                                <input type="text" name="project_name" id="project_name" class="form-control"
                                    value="{{ old('project_name', $order->project_name) }}" readonly>
                                <input type="hidden" name="project_name_hidden" value="{{ $order->project_name }}">
                            </td>
                        </tr>

                        <!-- Product Code -->
                        <tr>
                            <th scope="row">{{ __('Product') }}:</th>
                            <td>
                                <input type="text" name="product_code" id="product_code" class="form-control"
                                    value="{{ old('product_code', $order->product_code) }}" readonly>
                                <input type="hidden" name="product_code_hidden" value="{{ $order->product_code }}">
                            </td>
                        </tr>

                        <!-- Product Code -->
                        <tr>
                            <th scope="row">{{ __('Product') }}:</th>
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
                                <input type="text" name="product_code" id="product_code" class="form-control"
                                    value="{{ old('product_code', $order->product_code) }}" readonly>
                                <input type="hidden" name="product_code_hidden" value="{{ $order->product_code }}">
                            </td>
                        </tr>

                        <!-- Title Selection -->
                        <tr>
                            <th scope="row">{{ __('Title') }}:</th>
                            <td>
                                @php
                                    // Fetch the list of titles
                                    $titles = App\Repo\OrdersRepo::getTitlesList();
                                @endphp
                                <select name="title" id="title" class="form-select" required>
                                    @foreach ($titles as $code => $text)
                                        <option value="{{ $code }}" @if ($code == $order->title) selected @endif>
                                            {{ $text }}
                                        </option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="current_title" value="{{ $order->title }}">
                            </td>
                        </tr>

                        <!-- Description Name -->
                        <tr>
                            <th scope="row">{{ __('Description') }}:</th>
                            <td>
                                <textarea type="text" name="description" id="description" class="form-control">{{ old('description', $order->description) }}</textarea>
                                <input type="hidden" name="description_hidden" value="{{ $order->description }}">
                            </td>
                        </tr>

                        <!-- Revise Reason -->
                        <tr>
                            <th scope="row">{{ __('Revise Reason') }}:</th>
                            <td>
                                <textarea name="revise_reason" id="revise_reason" class="form-control" rows="3"
                                    required>{{ old('revise_reason') }}</textarea>
                            </td>
                        </tr>
            @endif

            @if ($action['notes']['shown'])
                @if ($action['notes']['required'])
                    <tr>
                        <th>* {{ __('Notes') }} <small class="text-danger">( {{ __('Required Field') }} )</small>
                        </th>
                        <td>
                            @if ($action['action'] != 'Close')
                            
                            <textarea name="notes" id="notes" class="form-control" rows="5" required></textarea>
                            @else

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="notes" id="noteApproved"
                                    value="Approved" onclick="toggleReasons(false)">
                                <label class="form-check-label" for="noteApproved">Approved</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="notes" id="noteRejected"
                                    value="Rejected" onclick="toggleReasons(true)">
                                <label class="form-check-label" for="noteRejected">Rejected</label>
                            </div>
                            <div id="reasonsField" style="display: none;">
                                <label for="reasons">{{ __('Select Reasons for Rejection') }}</label>
                                @foreach (\App\Enum\ReasonsEnum::values() as $i => $reason)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="reasons[]" id="reason{{++$i}}"
                                        value="Price is high">
                                    <label class="form-check-label" for="reason{{++$i}}">{{$reason}}</label>
                                </div>
                                @endforeach
                                <div class="form-check">
                                    <input class="form-check-input" onclick="createDesc()" type="checkbox"
                                        name="other" id="reason" value="Other">
                                    <label class="form-check-label" for="reason">Other</label>
                                </div> 
                                <div id="description-container"></div>
                            </div>
                            @endif
                        </td>
                    </tr>
                @else
                    <tr>
                        <th>{{ __('Notes') }}</th>
                        <td>
                            @if ($action['action'] != 'Close')
                            
                            <textarea name="notes" id="notes" class="form-control" rows="5" required></textarea>
                            @else

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="notes" id="noteApproved"
                                    value="Approved" onclick="toggleReasons(false)">
                                <label class="form-check-label" for="noteApproved">Approved</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="notes" id="noteRejected"
                                    value="Rejected" onclick="toggleReasons(true)">
                                <label class="form-check-label" for="noteRejected">Rejected</label>
                            </div>
                            <div id="reasonsField" style="display: none;">
                                <label for="reasons">{{ __('Select Reasons for Rejection') }}</label>
                                @foreach (\App\Enum\ReasonsEnum::values() as $i => $reason)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="reasons[]" id="reason{{++$i}}"
                                        value="Price is high">
                                    <label class="form-check-label" for="reason{{++$i}}">{{$reason}}</label>
                                </div>
                                @endforeach
                                <div class="form-check">
                                    <input class="form-check-input" onclick="createDesc()" type="checkbox"
                                        name="other" id="reason" value="Other">
                                    <label class="form-check-label" for="reason">Other</label>
                                </div> 
                                <div id="description-container"></div>
                            </div>
                            @endif
                        </td>
                    </tr>
                @endif
            @endif


            @if ($action['attachments']['shown'])
                @if ($action['attachments']['required'])
                    <tr>
                        <th>* {{ __('Attachments') }} <small class="text-danger">( {{ __('Required Field') }}
                                )</small>
                        </th>
                        <td><input type="file" name="files[]" id="files" class="form-control" multiple
                                required>
                        </td>
                    </tr>
                @else
                    <tr>
                        <th>{{ __('Attachments') }}</th>
                        <td><input type="file" name="files[]" id="files" class="form-control" multiple></td>
                    </tr>
                @endif
            @endif

            @if ($action['set_checker_id'])
                <tr>
                    <th>{{ __('Assigned To') }}</th>
                    <td>
                        @php
    if (Auth::user()->role->value == 'Manager') {
        $rolesArray = ['General Supervisor', 'Supervisor', 'Employee'];
    } elseif (Auth::user()->role->value == 'General Supervisor') {
        $rolesArray = ['Supervisor', 'Employee'];
    } elseif (Auth::user()->role->value == 'Supervisor') {
        $rolesArray = ['Employee'];
    }
    $users = App\Models\User::where([
        'department' => 'Technical Office',
    ])
        ->whereIn('role', $rolesArray)
        ->get();
                        @endphp
                        <select name="checker_id" class="form-control" size="1" required>
                            <option> -- {{ __('Select Employee') }} -- </option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->code }}. {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            @endif


            @if ($action['set_priority'])
                <tr>
                    <th>{{ __('Priority') }}</th>
                    <td>
                        @php
    $list = [
        App\Enum\PriorityEnum::Normal,
        App\Enum\PriorityEnum::Urgent,
        App\Enum\PriorityEnum::Emergency,
    ];
                        @endphp
                        @foreach ($list as $item)
                            <div class="form-check form-check-inline">
                                <span class="badge rounded-pill" style="background-color: {{ $item->color() }};">
                                    <input class="form-check-input" type="radio" name="priority"
                                        id="priority_{{ $item->value }}" value="{{ $item->value }}"
                                        @if ($item->value == $order->status->priority->value) checked @endif>
                                    <label class="form-check-label" for="priority_{{ $item->value }}">
                                        <i class="fa fa-{{ $item->icon() }}"></i>
                                        {{ $item->value }}
                                    </label>
                                </span>
                            </div>
                        @endforeach
                    </td>
                </tr>
            @endif

            @if ($action['set_expected_date'])
                <tr>
                    <th>{{ __('Expected Date') }}</th>
                    <td>
                        <input type="date" name="expected_date" id="expected_date" class="form-control">
                    </td>
                </tr>
            @endif

            @if ($action['set_expected_minutes'])
                <tr>
                    <th>{{ __('Expected Time') }} <small>( {{ __('in minutes') }} )</small></th>
                    <td>
                        <input type="number" name="expected_minutes" id="expected_minutes" class="form-control">
                    </td>
                </tr>
            @endif

        </tbody>
        <tfoot>
            <tr>
                @php
$status = App\Enum\StatusEnum::fromString($action['status']);
                @endphp
                <td colspan="2" class="text-end">
                    <input type="hidden" name="action" value="{{ $action['action'] }}">
                    <button type="submit" class="btn text-light" style="background-color: {{ $status->color() }};"
                        name="status" value="{{ $action['status'] }}">
                        <i class="fa fa-{{ $status->icon() }}"></i>
                        {{ $action['action'] }}
                    </button>
                </td>
            </tr>
        </tfoot>
    </table>
</form>

{{--  <script>
    function toggleReason(show) {
        document.getElementById('reasonField').style.display = show ? 'block' : 'none';
    }
    </script>  --}}

<script>
    function toggleReasons(show) {
        document.getElementById('reasonsField').style.display = show ? 'block' : 'none';
    }

    function createDesc() {
        // Get the checkbox and the container for the description
        const checkbox = document.getElementById('reason');
        const container = document.getElementById('description-container');

        // If the checkbox is checked, create a textarea; otherwise, remove it
        if (checkbox.checked) {
            // Create a textarea element if it doesn't already exist
            if (!document.getElementById('description-textarea')) {
                const textarea = document.createElement('textarea');
                textarea.className = 'form-control mt-2'; // Bootstrap styling
                textarea.id = 'description-textarea';
                textarea.name = 'reasons[]';
                textarea.placeholder = 'Please describe...';
                container.appendChild(textarea);
            }
        } else {
            // Remove the textarea if the checkbox is unchecked
            const textarea = document.getElementById('description-textarea');
            if (textarea) {
                container.removeChild(textarea);
            }
        }
    }
</script>
