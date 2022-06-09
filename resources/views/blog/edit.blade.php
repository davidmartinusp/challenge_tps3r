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
            <div class="col-lg-8">
                <h1>Edit Blog</h1>
                <form action="{{ url('update/' . $results->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-2">
                        <label for="name">Name : </label>
                        <input type="text" name="name" class="form-control" 
                            value="{{ old('name') ? old('name') : $results->name }}">
                        @error('name') <i class="text-danger">{{ $message }}</i> @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="name">Description : </label>
                        <input type="text" name="description" class="form-control" 
                            value="{{ old('description') ? old('description') : $results->description }}">
                        @error('description') <i class="text-danger">{{ $message }}</i> @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="name">Image : </label><br>
                        
                        <img src="{{ url($results->image) }}" width="150px" id="image" class="mt-2">

                        <input type="file" name="image" class="form-control mt-2" accept="image/*" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                        @error('image') <i class="text-danger">{{ $message }}</i> @enderror
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-warning">Update</button>
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