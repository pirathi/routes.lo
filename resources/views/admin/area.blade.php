@extends('admin.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ ('Create Area') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('store') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Area name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"  required autofocus>
    
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('Slug') }}</label>
    
                                <div class="col-md-6">
                                    <input id="slug" type="text" class="form-control" name="slug" value="" required>
    
                                </div>
                            </div>
    
                            
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection