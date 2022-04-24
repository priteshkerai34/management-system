<ol class="breadcrumb col-sm-12">
    <!-- Created At Field -->
    <div class="col-sm-6">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $category->created_at }}</p>
    </div>

    <!-- Updated At Field -->
    <div class="col-sm-6">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $category->updated_at }}</p>
    </div>
</ol>

<div class="card-body">

    <div class="form-group row">
        <label class="col-sm-2">Name:</label>
        <div class="col-sm-1">
            <i class="fas fa-arrow-right"></i>
        </div>
        <div class="col-sm-8">{{ $category->name }}</div>
    </div>

</div>