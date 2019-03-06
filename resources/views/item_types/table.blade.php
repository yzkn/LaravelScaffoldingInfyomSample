<table class="table table-responsive" id="itemTypes-table">
    <thead>
        <tr>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($itemTypes as $itemType)
        <tr>
            <td>{!! $itemType->name !!}</td>
            <td>
                {!! Form::open(['route' => ['itemTypes.destroy', $itemType->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('itemTypes.show', [$itemType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('itemTypes.edit', [$itemType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>