<!-- Name <span class="required">*</span> Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name <span class="required">*</span>:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Id <span class="required">*</span> Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_id', 'Type Id <span class="required">*</span>:') !!}
    {!! Form::number('type_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('items.index') !!}" class="btn btn-default">Cancel</a>
</div>
