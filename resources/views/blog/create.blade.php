@extends('noble::master')

@section('content-header')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
    	<h4 class="mb-3 mb-md-0">Form Challenge</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <nav class="page-breadcrumb">
        	<ol class="breadcrumb">
        		<li class="breadcrumb-item"><a href="#">Challenge TPS3R</a></li>
        		<li class="breadcrumb-item active" aria-current="page">Challenge</li>
        	</ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
        	<div class="card-body">
            	Welcome to Challenge TPS3R
        	</div>
        </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <h1>Add New Blog</h1>
                <form action="{{ url('store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-2">
                        <label for="name">Title : </label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        @error('name') <i class="text-danger">{{ $message }}</i> @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="name">Description : </label>
                        <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                        @error('description') <i class="text-danger">{{ $message }}</i> @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="name">Image : </label>
                        <input type="file" name="image" class="form-control">
                        @error('image_id') <i class="text-danger">{{ $message }}</i> @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="name">Image : </label>
                        <input type="file" name="image" class="form-control">
                        @error('image_id') <i class="text-danger">{{ $message }}</i> @enderror
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

@section('css')

@endsection

@section('js')
	
@endsection