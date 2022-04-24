<ol class="breadcrumb col-sm-12">
    <!-- Created At Field -->
    <div class="col-sm-6">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $items->created_at }}</p>
    </div>

    <!-- Updated At Field -->
    <div class="col-sm-6">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $items->updated_at }}</p>
    </div>
</ol>

<div class="card-body">

    <div class="form-group row">
        <label class="col-sm-2">Category:</label>
        <div class="col-sm-1">
            <i class="fas fa-arrow-right"></i>
        </div>
        <div class="col-sm-8">{{ $items->categories }}</div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2">Name:</label>
        <div class="col-sm-1">
            <i class="fas fa-arrow-right"></i>
        </div>
        <div class="col-sm-8">{{ $items->name }}</div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2">Url Items:</label>
        <div class="col-sm-1">
            <i class="fas fa-arrow-right"></i>
        </div>
        <div class="col-sm-8">{{ $items->items_url }}</div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2">Current Price:</label>
        <div class="col-sm-1">
            <i class="fas fa-arrow-right"></i>
        </div>
        <div class="col-sm-8">{{ $items->current_price }}</div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2">Regular Price</label>
        <div class="col-sm-1">
            <i class="fas fa-arrow-right"></i>
        </div>
        <div class="col-sm-8">{{ $items->regular_price }}</div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2">Available Stock</label>
        <div class="col-sm-1">
            <i class="fas fa-arrow-right"></i>
        </div>
        <div class="col-sm-8">{{ $items->available_stock }}</div>
    </div>


    <div class="form-group row">
        <label class="col-sm-2">Description</label>
        <div class="col-sm-1">
            <i class="fas fa-arrow-right"></i>
        </div>
        <div class="col-sm-8">{{ $items->description }}</div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2">Item Visibility:</label>
        <div class="col-sm-1">
            <i class="fas fa-arrow-right"></i>
        </div>
        <div class="col-sm-8">{{ $items->item_visibility }}</div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2">Item Tax Category:</label>
        <div class="col-sm-1">
            <i class="fas fa-arrow-right"></i>
        </div>
        <div class="col-sm-8">{{ $items->tax_category }}</div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2">Images:</label>
        <div class="col-sm-1">
            <i class="fas fa-arrow-right"></i>
        </div>
        <div class="col-sm-8">
            @foreach($items->images as $image)
            <p>{{ $image->id }} : {{ $image->images }}</p>
            @endforeach
        </div>
    </div>
</div>