<div class="table-responsive">
    <table class="table" id="items-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Url Items</th>
                <th>Current Price</th>
                <th>Regular Price</th>
                <th>Available Stock</th>
                <th>Item Visibility</th>
                <th>Item Tax Category</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $items)
            <tr>
                <td>{{ $items->name }}</td>
                <td>{{ $items->items_url }}</td>
                <td>{{ $items->current_price }}</td>
                <td>{{ $items->regular_price }}</td>
                <td>{{ $items->available_stock }}</td>
                <td>{{ $items->item_visibility }}</td>
                <td>{{ $items->tax_category->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['items.destroy', $items->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('items.show', [$items->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('items.edit', [$items->id]) }}" class='btn btn-default btn-xs'>
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