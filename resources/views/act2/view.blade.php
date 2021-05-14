@extends('layouts.designav')
@section('title', 'Files / Details')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card justify-content-center">
            <div class="card-header card-header-primary">
                <h4 class="card-title">{{ $file->name }}</h4>
            </div>
            <div class="card-body">
                <div class="row px-4">
                    <div class="col-md-4">
                        <p>Name:</p>
                        <p>File Type:</p>
                    </div>
                    <div class="col-md-4">
                        <p>{{ $file->name }}</p>
                        <p>{{ $file->type }}</p>
                    </div>
                </div>
                <div class="col-md-6-offset-4">
                    {{-- <embed src="/storage/{{ $file->path }}" type="application/pdf" width="100%" height="600px" />--}}
                    <a href="{{url('/')}}/storage/{{ $file->path }}" class="btn btn-round btn-success">Open File </a>
                   {{--  <iframe src="{{ url('storage/'. $file->path) }}" frameborder="0" style="width: 100%"></iframe> --}}  
               </div>  
            </div>
            <div class="card-footer">
                <form action="{{ route('file.destroy',  $file) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-round btn-danger  mx-5 px-5"><i class="material-icons">delete</i> Delete File</button>
                </form>
                <a href="{{ route('file.edit', $file) }}" class="btn btn-success btn-round mx-5 px-5"><i class="material-icons">edit</i> Edit File</a>
            </div>
        </div>
        
    </div>
</div>
@endsection