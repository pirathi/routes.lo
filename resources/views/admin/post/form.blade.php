<div class="form-group row">
    {!! Form::label('category', 'Category', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {{-- {!! Form::text('category', null, ['class' => 'form-control', 'required' => 'required']) !!} --}}
        {{ Form::select('category', $categories, null, ['class'=>'form-control', 'placeholder'=>'Select category','required' => 'required']) }}

    </div>
</div>
<div class="form-group row">
    {!! Form::label('district', 'District', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::select('district', $districts, null, ['class' => 'form-control', 'required' => 'required',  'id' => 'district', 'placeholder'=>'Select district']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('area', 'Area', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::select('area', $areas, null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Select area', 'id' => 'area']) !!}
        <!--  
        <select name="area" id="area" class="form-control input-sm">
            <option value="{{ old('area_name') }}">Choose Area</option>
        </select>-->
    </div>
</div>
<div class="form-group row">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('description', 'Description', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4, 'cols' => 54, 'required' => 'required']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('address', 'Address', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::textarea('address', null, ['class' => 'form-control', 'rows' => 4, 'cols' => 54, 'required' => 'required']) !!}
    </div>
</div>
{{-- {{ $post }} --}}
@if(isset($post))
    <div class="form-group row">
        {!! Form::label('longitude', 'Longitude', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
        <div class="col-md-6">
            {!! Form::text('longitude', null, ['class' => 'form-control','required' => 'required']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('latitude', 'Latitude ', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
        <div class="col-md-6">
            {!! Form::text('latitude', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
    </div>
@endif

<div class="form-group row">
    {!! Form::label('phone', 'Phone', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('email', 'Email', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('website', 'Website', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::text('website', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('tags', 'Tags', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::text('tags', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6 offset-md-4">
        {{ Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-primary text-md-right']) }}
    </div>
</div>


<!-- <script src="https://code.jquery.com/jquery-3.5.0.js"></script> -->
@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


<script type="text/javascript">
    
    $('#district').on('change', function(e) {
        var dis_id = $(this).val();
        var _token = "{{ csrf_token() }}";

        $.ajax({
            url: "{{ route('getarea') }}",
            type: "POST",
            data: {dis_id:dis_id,_token:_token},
            success: function (res) {
                console.log(res);
                $('#area').empty();

                $.each(res,function(key, value)
                {
                    $("#area").append('<option value=' + value.id + '>' + value.area_name + '</option>');
                });
            },
        });
        
    });
</script>
@endpush