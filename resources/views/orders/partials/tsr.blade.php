@if (Auth::user()->department->value == 'Sales' &&
        Auth::user()->role->value == 'Manager' &&
        $order->status->status->value == 'Submitted')
    <div class="col-lg-6">
        <h5 class="text-left">
            SOP-TSR 02 - Approve TSR:
        </h5>
        <ul class="list-group">
            <li class="list-group-item">Review TSR and make sure it makes sense technically. Focus on the
                project and customer details for follow-up purposes.</li>
            <li class="list-group-item">You may refuse a TSR if it's deemed a waste of time—for instance,
                after determining there's a low likelihood of winning the project while the task is
                time-consuming.</li>
            <li class="list-group-item">The TSR urgency status is ‘Normal’ by default. However, you can
                change to ‘Urgent’ which raises its priority in general, or ‘Emergency’ which puts it on the
                top of the priority list.</li>
        </ul>
    </div>
@elseif(Auth::user()->department->value == 'Technical Office' &&
        Auth::user()->role->value == 'Manager' &&
        $order->status->status->value == 'Approved')
    <div class="col-lg-6">
        <h5 class="text-left">
            SOP-TSR 03 - Review TSR preliminary:
        </h5>
        <ul class="list-group">
            <li class="list-group-item">Review TSR and make sure it includes enough data to fulfil the
                customer request, otherwise, return to Sales Rep. You may attach screenshots to show the
                refusal reason if necessary.</li>
            <li class="list-group-item">If you are going to perform the TSR yourself, estimate the time
                needed to finish it and the expected completion date (ECD). Otherwise, assign a tech member
                to perform it.</li>
        </ul>
    </div>
@elseif(Auth::user()->department->value == 'Technical Office' && $order->status->status->value == 'Assigned')
    <div class="col-lg-6">
        <h5 class="text-left">
            SOP-TSR 04 - Accept TSR:
        </h5>
        <ul class="list-group">
            <li class="list-group-item">Review TSR in detail and make sure it includes enough data to fulfil
                the customer request, otherwise, return to Sales Rep. You may attach screenshots to show the
                refusal reason if necessary.</li>
            <li class="list-group-item">Estimate the time needed to finish it and the expected completion
                date (ECD).</li>
        </ul>
    </div>
@elseif(Auth::user()->department->value == 'Technical Office' &&
        in_array($order->status->status->value, ['Accepted', 'Clearefied']))
    <div class="col-lg-6">
        <h5 class="text-left">
            SOP-TSR 05 - Finish TSR:
        </h5>
        <ul class="list-group">
            <li class="list-group-item">Start working on the task, if it has a missing data that could be
                assumed or ignored, you may send feedback to the Sales Rep so that he clarifies it before
                the ECD, otherwise, you can assume or ignore the missing details and finish the task on
                time.</li>
            <li class="list-group-item">If the Sales Rep’s clarification will lead to extra work, you may
                extend the ECD accordingly.</li>
            <li class="list-group-item">Perform the task considering all data and customer requirements and
                finish it on the ECD as maximum.</li>
            <li class="list-group-item">Attach the output file as PDF (or ZIP if many) after making sure the
                TSR no. is mentioned on the footer of every page. If customer requested Excel format, make
                sure it is a plain display of the output data without formulas, electronic stamp or
                signature.</li>
        </ul>
    </div>
@elseif(Auth::user()->department->value == 'Sales' &&
        Auth::user()->role->value == 'Employee' &&
        $order->status->status->value == 'Forwarded')
    <div class="col-lg-6">
        <h5 class="text-left">
            SOP-TSR 06 - Clarify missing info:
        </h5>
        <ul class="list-group">
            <li class="list-group-item">Understand what Technical Support needs and convey it to the
                customer.</li>
            <li class="list-group-item">If the customer cannot clarify, explain the implications to him,
                such as, extra waiting time, ignored part of the task, less accurate results, or assumed
                data.</li>
            <li class="list-group-item">If the customer adds or changes considerable part of data, expect
                extending ECD and convey to the customer if necessary.</li>
        </ul>
    </div>
@elseif(Auth::user()->department->value == 'Sales' &&
        Auth::user()->role->value == 'Employee' &&
        $order->status->status->value == 'Finished')
    <div class="col-lg-6">
        <h5 class="text-left">
            SOP-TSR 07 - Close TSR:
        </h5>
        <ul class="list-group">
            <li class="list-group-item">Review output file to make sure it meets the main customer
                requirements, otherwise, return to technical for editing.</li>
            <li class="list-group-item">Sent the output file to the customer and inform him you are
                expecting his feedback.</li>
            <li class="list-group-item">Follow with the customer until receiving either approval or request
                for revision.</li>
            <li class="list-group-item">If the TSR is approved, request the approval copy from the customer
                and attach it if received when closing the TSR. Mention the related quotation or WO if
                applicable.</li>
        </ul>
    </div>
@endif
