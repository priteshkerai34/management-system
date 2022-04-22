<div class="table-responsive">
    <table class="table" id="profiles-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Number</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($profiles as $profiles)
            <tr>
                <td>{{ $profiles->name }}</td>
                <td>{{ $profiles->email }}</td>
                <td>{{ $profiles->number }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['profiles.destroy', $profiles->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('profiles.show', [$profiles->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>