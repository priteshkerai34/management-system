<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Tax Rate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tax_rate', 'Tax Rate:') !!}
    {!! Form::number('tax_rate', null, ['class' => 'form-control']) !!}
</div>