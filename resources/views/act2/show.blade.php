@extends('layouts.dashboard')

@section('content')
@include('notif.notif')
<div class="row justify-content-center mt-5">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header ">
                <a href="{{ route('file.index') }}" class="btn btn-primary btn-sm float-right">
                        <i class="fa fa-reply" aria-hidden="true"></i> Back to Files
                    </a>
                    <h5 class="text-center">{{ $file->name }}</h5>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                                <p>Name:</p>
                                <p>File Type:</p>
                        </div>
                        <div class="col-md-6">
                                <p>{{ $file->name }}</p>
                                <p>{{ $file->type }}</p>
                        </div>
                    </div>
                     <div class="col-md-6-offset-4">
                         {{-- <embed src="/storage/{{ $file->path }}" type="application/pdf" width="100%" height="600px" />--}}
                         <a href="/storage/{{ $file->path }}"><button type="submit"> Open File </button></a>
                        {{--  <iframe src="{{ url('storage/'. $file->path) }}" frameborder="0" style="width: 100%"></iframe> --}}  
                    </div>   
                </div>
               <div class="card-footer">
                    <div class="d-inline-flex">
                        <form action="{{ route('file.destroy',  $file) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-sm btn-danger  mx-5 px-5"> Delete Product</button>
                        </form>
                        <a href="{{ route('file.edit', $file) }}" ><button type="button" class="btn btn-sm btn-info mx-5 px-5 "> Edit Product</button></a>
                               
                    </div>
                </div>              
            </div>
        </div>
    </div>
@endsection