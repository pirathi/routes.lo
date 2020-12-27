@extends('admin.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ ('Add your Business here for Free in Srilanka') }}</div>
    
                    <div class="card-body">
                        {{-- <form method="POST" action="{{ route('post.store') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('District') }}</label>
    
                                <div class="col-md-6">
                                    <select name="district" id="district" class="form-control">
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}">{{ $district->districts_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
    
                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" name="city" value="{{ old('email') }}" required>
    
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="name" required>
    
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
    
                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control" name="description" required>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
    
                                <div class="col-md-6">
                                    <input id="category" type="text" class="form-control" name="category" required>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" required>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="contact_no" class="col-md-4 col-form-label text-md-right">{{ __('Contact No') }}</label>
    
                                <div class="col-md-6">
                                    <input id="contact_no" type="text" class="form-control" name="contact_no" required>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('Website') }}</label>
    
                                <div class="col-md-6">
                                    <input id="website" type="text" class="form-control" name="website" >
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="tags" class="col-md-4 col-form-label text-md-right">{{ __('Tags') }}</label>
    
                                <div class="col-md-6">
                                    <input id="tags" type="text" class="form-control" name="tags" >
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button> <button type="submit" class="btn btn-danger">
                                        {{ __('Cancel') }}
                                    </button>
                                </div>
                            </div>
                        </form> --}}
                        {!! Form::open(['method' => 'post', 'class' => 'form', 'action' => 'Admin\PostController@store']) !!}
                            @include('admin.post.form');
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

    