@extends('admin.index')
        <a href="{{ route('post.create') }}" class="btn btn-primary">Create</a>

<style>
    a.edit {
        color: #FFC107;
    }
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route('post.create') }}" class="btn btn-primary mt-3">Create</a>
                <div class="mt-3">
                    {{-- {!! Form::text('category', null, ['class' => 'form-control', 'required' => 'required']) !!} --}}
                    {{ Form::select('category', $categories, null, ['class'=>'form-control col-md-4 ','id'=>'category', 'placeholder'=>'Select category','required' => 'required']) }}
            
                </div>
                <table id='result' class="table table-bordered table-striped mt-5" style="width: 100%;border:1px solid #ccc">
                    <thead>
                        <th>Name</th>
                        <th>Category</th>
                        <th>District</th>
                        <th>Area</th>
                        <th>Action</th>
                    </thead>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->name }}</td>
                            <td> <?php $category = \App\Models\Category::find($post->category ) ?> {{ ucfirst($category->category_name) }}</td>
                            <td> <?php $district = \App\Models\District::find($post->district ) ?> {{ ucfirst($district->districts_name) }}</td>
                            <td> <?php $area = \App\Models\Area::find($post->area ) ?>{{ $area->area_name }}</td>
                            <td>
                                <li class="list-inline-item">
                                    <a  href="{{ route('post.edit',$post->id) }}" class="btn btn-success btn-sm rounded-0"  data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    {{ Form::open([ 'method'  => 'delete', 'route' => [ 'post.destroy', $post->id ] ]) }}
                                        {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm rounded-0']) }}
                                    {{ Form::close() }}
                                </li>
                            </td>

                        </tr>
                    @endforeach
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
    @push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
    
    <script type="text/javascript">
        
        $('#category').on('change', function(e) {
            var cat_id = $(this).val();
            var _token = "{{ csrf_token() }}";
            // alert(cat_id)
    
            $.ajax({
                url: "{{ route('getcategory') }}",
                type: "POST",
                data: {cat_id:cat_id,_token:_token},
                success: function (res) {
                    console.log(res);
                    $('#result').remove();
                    $.each(res,function(key, value) {
                     $('#result').html(res);

                    });
    
                    // $.each(res,function(key, value)
                    // {
                    //     $("#area").append('<option value=' + value.id + '>' + value.area_name + '</option>');
                    // });
                },
            });
            
        });
    </script>
    @endpush
@endsection