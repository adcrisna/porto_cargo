<table>
    <thead>
        <tr>
            <th>Status Update</th>
            <th>Remarks</th>
            <th>Last Update</th>
            <th>Link Document</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($claim as $key => $value)
            <tr>
                <td>{{ $value->claim_status }}</td>
                <td>{{ $value->remarks }}</td>
                <td>{{ $value->updated_at }}</td>
                @if ($value->claim_status == 'approve')
                    <td>{{ $value->compensation_letter }}</td>
                @else
                    <td>{{ $value->rejection_latter }}</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
