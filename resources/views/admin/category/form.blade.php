<div class="form-group row">
    {!! Form::label('category_name', 'Category name', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::text('category_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('slug', 'Slug', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::text('slug', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('icon_class', 'Icon class', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::text('icon_class', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6 offset-md-4">
        {{ Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-primary text-md-right']) }}
    </div>
</div>