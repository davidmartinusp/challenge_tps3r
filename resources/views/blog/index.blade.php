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
		        <h1>Latihan CRUD Blog</h1>
                <a href="{{ url('blog.create') }}" class="btn btn-primary"> + Tambah Blog </a>
                <a href="{{ url('downloadpdf') }}" class="btn btn-info"> Download PDF </a>
                <table class="table mt-2">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    @forelse ($data_blog as $i => $blog )
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $blog->name }}</td>
                        <td>{{ $blog->description }}</td>
                        <td>{{ $blog->createdUser->name }}</td>
                        <td><img src="{{ ('public/blog/' .$blog->image) }}" width="100px"></td>
                        <td>
                            <a href="{{ url ('blog.edit/' . $blog->id) }}" class="btn btn-warning"> Edit </a>
                            <a href="{{ url ('destroy/' . $blog->id) }}" class="btn btn-danger"> Delete </a>
                        </td>
                    </tr>
                    @empty
                        
                    @endforelse
                </table>
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