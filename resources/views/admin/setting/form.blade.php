<div class="form-group row">
    {!! Form::label('app_name', 'Application name', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::text('app_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('app_des', 'Description', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::textarea('app_des', null, ['class' => 'form-control', 'rows' => 4, 'cols' => 54]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('logo', 'Logo', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::file('logo') !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('favicon', 'Favicon', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::file('favicon') !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6 offset-md-4">
        {{ Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-primary text-md-right']) }}
    </div>
</div>