<table>
    <thead>
        <tr>
            <th colspan="3"></th>
            <th colspan="17">SUPPLIER AUDIT RESULT TABULAR REPORTS</th>
        </tr>
        <tr>
            <th style="background-color: #87d4ed; border: 1px solid black;">Audit Type</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Audit Report Control No.</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Business Process</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Audit Date</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Auditors</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Auditees</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Issued Date</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Deadline of Submission</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Actual Date of Submission</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">ISO / IATF Clause</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Category of Findings</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Classification / Rank</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Responsible Department</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Statement of Findings</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Illustration</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Root Cause</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Improvement Plan</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Person In-charge</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Commitment Date</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Close-Out Audit</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Sending Status</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Audit Status</th>
        </tr>
    </thead>
    <tbody>
        @for($index = 0; $index < count($suppliers); $index++)
            <tr>
                <td> {{ $suppliers[$index]->audit_type }} </td>
                <td> {{ $suppliers[$index]->audit_report_control_no }} </td>
                <td> {{ $suppliers[$index]->business_process }} </td>
                <td>{{ \Carbon\Carbon::parse($suppliers[$index]->audit_date_from)->toFormattedDateString() }} - {{ \Carbon\Carbon::parse($suppliers[$index]->audit_date_to)->toFormattedDateString() }}</td>
                <td> {{ $suppliers[$index]->auditors }} </td>
                <td> {{ $suppliers[$index]->auditees }} </td>
                @if($suppliers[$index]->audit_findings_issued_date != "")
                    <td>{{ \Carbon\Carbon::parse($suppliers[$index]->audit_findings_issued_date)->toFormattedDateString() }}</td>
                @else
                    <td></td>
                @endif
                @if($suppliers[$index]->deadline_of_submission != "")
                    <td>{{ \Carbon\Carbon::parse($suppliers[$index]->deadline_of_submission)->toFormattedDateString() }}</td>
                @else
                    <td></td>
                @endif
                @if($suppliers[$index]->actual_date_of_submission != "")
                    <td>{{ \Carbon\Carbon::parse($suppliers[$index]->actual_date_of_submission)->toFormattedDateString() }}</td>
                @else
                    <td></td>
                @endif
                <td> {{ $suppliers[$index]->iso_iatf_clause }} </td>
                <td> {{ $suppliers[$index]->category_of_findings }} </td>
                <td> {{ $suppliers[$index]->classification }} </td>
                <td>
                    @for($index2 = 0; $index2 < count($suppliers[$index]->supplier_departments); $index2++)
                        {{ $suppliers[$index]->supplier_departments[$index2]->departments[0]->department_name }}
                        @if($index2 <= (count($suppliers[$index]->supplier_departments) - 2))
                            , 
                        @endif
                    @endfor
                </td>
                <td> {{ $suppliers[$index]->statement_of_findings }} </td>
                <td> {{ $suppliers[$index]->illustration }} </td>
                <td> {{ $suppliers[$index]->root_cause }} </td>
                <td> {{ $suppliers[$index]->improvement_action }} </td>
                
                <td>
                    @for($index2 = 0; $index2 < count($suppliers[$index]->person_in_charges); $index2++)
                        @if(count($suppliers[$index]->person_in_charges) > 0)
                            @isset($suppliers[$index]->person_in_charges[$index2]->person_in_charge_record->name)
                                {{ $suppliers[$index]->person_in_charges[$index2]->person_in_charge_record->name }}
                            @endisset
                            @if($index2 <= (count($suppliers[$index]->person_in_charges) - 2))
                                , 
                            @endif
                        @endif
                    @endfor
                </td>

                @if($suppliers[$index]->commitment_date != "")
                    <td>{{ \Carbon\Carbon::parse($suppliers[$index]->commitment_date)->toFormattedDateString() }}</td>
                @else
                    <td></td>
                @endif
                <td> {{ $suppliers[$index]->corrective_action }} </td>
                @if($suppliers[$index]->sending_stat == 1)
                    <td>Pending</td>
                @else
                    <td>Done</td>
                @endif
                @if($suppliers[$index]->audit_stat == 1)
                    <td>For Improvement Plan</td>
                @elseif($suppliers[$index]->audit_stat == 2)
                    <td>For Close-Out Audit</td>
                @else
                    <td>Closed</td>
                @endif  
            </tr>
        @endfor
    </tbody>
</table>