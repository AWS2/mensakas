<div class="table-responsive">
    <table class="table" id="businesses-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Phone</th>
        <th>Logo</th>
        <th>Image</th>
        <th>Active</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($businesses as $business)
            <tr>
                <td>{{ $business->name }}</td>
            <td>{{ $business->phone }}</td>
            <td>{{ $business->logo }}</td>
            <td>{{ $business->image }}</td>
            <td>{{ $business->active }}</td>
                <td>
                    {!! Form::open(['route' => ['businesses.destroy', $business->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('businesses.show', [$business->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('businesses.edit', [$business->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
