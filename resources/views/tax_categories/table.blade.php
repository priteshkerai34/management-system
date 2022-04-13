<div class="table-responsive">
    <table class="table" id="taxCategories-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Tax Rate</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($taxCategories as $taxCategory)
            <tr>
                <td>{{ $taxCategory->name }}</td>
            <td>{{ $taxCategory->tax_rate }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['taxCategories.destroy', $taxCategory->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('taxCategories.show', [$taxCategory->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('taxCategories.edit', [$taxCategory->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
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
