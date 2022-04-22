<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category', 'Category:') !!}
    <select class="form-control" id="category" name="category">
        @foreach($category as $category)
        <option value="{{ $category }}">{{ $category }}</option>
        @endforeach
    </select>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'onkeyup' => 'url()']) !!}
</div>

<!-- Url Items Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url_items', 'Url Items:') !!}
    {!! Form::text('url_items', null, ['class' => 'form-control']) !!}
</div>

<!-- Current Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('current_price', 'Current Price:') !!}
    {!! Form::number('current_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Regular Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Regular_price', 'Regular Price:') !!}
    {!! Form::number('Regular_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Available Stock Field -->
<div class="form-group col-sm-6">
    {!! Form::label('available_stock', 'Available Stock:') !!}
    {!! Form::number('available_stock', null, ['class' => 'form-control']) !!}
</div>

<!-- Item Tax Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('item_tax_category', 'Item Tax Category:') !!}
    <select class="form-control" id="item_tax_category" name="item_tax_category">
        @foreach($tax_category as $tax_category)
        <option value="{{ $tax_category }}">{{ $tax_category }}</option>
        @endforeach
    </select>
</div>

<!-- Item Tax Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('item_visibility', 'Item Visibility:') !!}
    {!! Form::select('item_visibility', ['Yes'=>'Yes','No'=>'No'], null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-12">
    {!! Form::label('images', 'Images:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('images[]', ['class' => 'custom-file-input','multiple']) !!}
            {!! Form::label('images', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>

<!-- Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<script>
    function url() {
        var name = document.getElementById('name').value;
        url_items.value = name + <?php echo rand(10, 999) ?>
    }
</script>