<table>
    <thead>
        <tr>
            @foreach ($data->first()->getAttributes() as $column => $value)
                <th>{{ ucfirst($column) }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                @foreach ($row->getAttributes() as $value)
                    <td>{{ $value }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
